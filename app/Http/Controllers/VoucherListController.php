<?php

namespace App\Http\Controllers;

use App\Voucher;
use App\Customer;
use Carbon\Carbon;
use App\VoucherName;
use Illuminate\Http\Request;
use App\StatusList;

class VoucherListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vouchers=Voucher::where('expired_date','<',now())->update(['status_id' => 2]);

        $vouchers = Voucher::with(['Customer','Status','VoucherName'])
                    ->orderBy('status_id', 'asc')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('voucherlist.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $voucherNames = VoucherName::where('active',1)->get(['id', 'name','expired_date']);
        return view('voucherlist.create',compact('voucherNames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'voucher' => 'required',
        ]);
        $name = $request->get('name');
        $email = $request->get('email');

        // - cek dulu apakah email sudah ada di daftar customer
        if ($customer = Customer::where('email', $email)->first()){
            // - jika sudah ada ambil id customernya
            $customer_id= $customer->id;
        }else{
            // - jika belum ada, insert dulu ke customer lalu ambil id customernya
            $customer = Customer::create([
                'name' => $name,
                'email' => $email,
            ]);
            $customer_id= $customer->id;
        }

        // - selanjutnya cek di daftar voucher, jika customer masih mempunyai voucher yang masih berlaku untuk jenis voucher yang sama yang direquest,customer tidak boleh generate lagi.
        if (Voucher::where('customer_id',$customer_id )
                ->where('expired_date','>',now()) //date belum expired
                ->where('status_id',1) //statusnya masih create
                ->first()){
            $alert="warning";
            $message="You still have active voucher";
        }else{
            // - Jika customer tidak mempunyaivoucher yang sama dan berlaku maka voucher dibuatkan
            $voucherName= VoucherName::where('id',$request->voucher)->first();
            $expire_date = $voucherName->expired_date;
            $period = $voucherName->period;
            $short_code=$voucherName->short_code;
            $total_voucher = $voucherName->total_voucher_qty;
            $current_voucher_qty = $voucherName->generate_voucher_qty;

            //cek jika voucher masih tersedia (generate_voucher_qty < total_voucher_qty)
            if($current_voucher_qty<$total_voucher){

                $dt = Carbon::now();

                $expire_date = $voucherName->expired_date;
                $period = $voucherName->period;
                $short_code=$voucherName->short_code;

                $length_days = ($dt->diffInDays($expire_date))+1;

                //cek jika antara date now + period melebihi expire date, maka expired date disesuasikan sisa harinya.
                if($length_days >= $period){
                    $expire_date = $dt->addDays($length_days);
                }

                //kode generator( kode di voucher name + id + timestamp tanggalsekarang)
                $code=($short_code.$customer_id.$dt->timestamp);

                $voucher = Voucher::create([
                    'code' => $code,
                    'customer_id' => $customer_id,
                    'voucher_name_id' => $request->voucher,
                    'expired_date' => ($expire_date),
                    'status_id' => 1 //for first status: create voucher
                ]);
                // setelah voucher dibuat, voucher dikirim ke email;
                if($voucher){
                    $voucherName = VoucherName::find($voucher->voucher_name_id);
                    $voucherName->generate_voucher_qty = $current_voucher_qty+1;
                    $voucherName->save();

                    $alert="success";
                    $message="Voucher code is ".$code." created and will also send to customer email";
                }
            }
            else {
                $alert="warning";
                $message="Voucher out of stock";
            }
        }

        return redirect('/voucher-lists')->with($alert,$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher,$id)
    {
        $voucher = Voucher::find($id)->with(['Customer','Status','VoucherName'])->first();
        $voucherNames = VoucherName::where('active',1)->get(['id', 'name','expired_date']);
        $status_lists = StatusList::all(['id', 'status']);
        return view('voucherlist.edit',compact('voucherNames', 'voucher','status_lists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher,$id)
    {

        $status = $request->get('status');

        $voucher = Voucher::find($id);
        $code = $voucher->code;
        $voucher->status_id =$status;
        $voucher->save();

        $alert="success";
        $message="Voucher code ".$code." is already updated.";

        return redirect('/voucher-lists')->with($alert,$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Voucher $voucher, $id)
    {
        $voucher = Voucher::find($id);
        $voucher_name_id = $voucher->voucher_name_id;
        $code = $voucher->code;

        $voucher = $voucher->delete();

        if($voucher){
            $voucherName = VoucherName::find($voucher_name_id);

            $current_qty = $voucherName->generate_voucher_qty;

            $voucherName->generate_voucher_qty = $current_qty-1;
            $voucherName->save();
            $message = "Voucher ".$code." has been delete";
        }

        $vouchers = Voucher::with(['Customer','Status','VoucherName'])->get();

        return redirect('/voucher-lists')->with('success',$message);

    }
}
