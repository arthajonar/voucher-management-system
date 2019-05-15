<?php

namespace App\Http\Controllers;

use App\Voucher;
use App\Customer;
use Carbon\Carbon;
use App\VoucherName;
use App\Mail\sendToCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Client;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mailBoxLayerKey = config('app.mailboxlayerkey');
        if($mailBoxLayerKey==null){
            $alert="warning";
            $message="Setup your mailboxlayer key first";
        } else {
            $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|email',
                'voucher' => 'required',
            ]);
            $name = $request->get('name');
            $person = $request->get('name');
            $email = $request->get('email');


            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', 'http://apilayer.net/api/check?access_key='.$mailBoxLayerKey.'&email='.$email.'&smtp=1&format=1');
            $string = $res->getBody()->getContents();
            $string = iconv("ISO-8859-1","UTF-8",$string);
            $string = json_decode((string) $string, true);
            if($string['smtp_check']){
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
                    $name=$voucherName->name;

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
                        //voucher yang terpakai ditambah satu
                        if($voucher){
                            $voucherName = VoucherName::find($voucher->voucher_name_id);
                            $voucherName->generate_voucher_qty = $current_voucher_qty+1;
                            $voucherName->save();

                            $to = [
                                [
                                    'email' => $email,
                                    'name' => $person,
                                ]
                            ];

                            Mail::to($to)->send(new sendToCustomer($code,$name,$expire_date));


                            $alert="success";
                            $message="Voucher code will send to your email";
                        }
                    }
                    else {
                        $alert="warning";
                        $message="Voucher out of stock";
                    }
                }
            } else{
                $alert="warning";
                $message="Your email is not valid. Please input valid email";
            }
        }

        return redirect('/')->with($alert,$message);

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
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
        //
    }
}
