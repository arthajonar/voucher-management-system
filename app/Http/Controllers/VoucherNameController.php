<?php

namespace App\Http\Controllers;

use App\VoucherName;
use Illuminate\Http\Request;

class VoucherNameController extends Controller
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
        $voucherNames = VoucherName::all();
        return view('vouchernames.index', compact('voucherNames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $voucherNames = VoucherName::all(['id', 'name','expired_date']);
        return view('vouchername.create');
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
            'name' => 'required|max:255',
            'short_code' => 'required|unique:voucher_names',
            'period' => 'required',
            'expired_date' => 'required',
            'total_voucher_qty' => 'required',
        ]);

        $name = $request->get('name');
        $short_code = $request->get('short_code');
        $period = $request->get('period');
        $total_voucher_qty = $request->get('total_voucher_qty');
        $expired_date = $request->get('expired_date');

        $voucherName = VoucherName::create([
            'name' => $name,
            'short_code' => $short_code,
            'period'    => $period,
            'total_voucher_qty'    => $total_voucher_qty,
            'expired_date'  => $expired_date
        ]);

        $alert="success";
        $message="New Master Voucher is created.";

        return redirect('/vouchernames')->with($alert,$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VoucherName  $voucherName
     * @return \Illuminate\Http\Response
     */
    public function show(VoucherName $voucherName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VoucherName  $voucherName
     * @return \Illuminate\Http\Response
     */
    public function edit(VoucherName $voucherName, $id)
    {

        $voucherName = VoucherName::where('id',$id)->first();
        return view('vouchername.edit',compact('voucherName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VoucherName  $voucherName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoucherName $voucherName, $id)
    {
        $this->validate(request(), [
            'name' => 'required|max:255',
            'short_code' => 'required',
            'period' => 'required',
            'expired_date' => 'required',
            'total_voucher_qty' => 'required',
            'status' => 'required',
        ]);

        $name = $request->get('name');
        $short_code = $request->get('short_code');
        $period = $request->get('period');
        $total_voucher_qty = $request->get('total_voucher_qty');
        $expired_date = $request->get('expired_date');
        $status = $request->get('status');

        $voucherName = VoucherName::find($id);
        $voucherName->name = $name;
        $voucherName->short_code = $short_code;
        $voucherName->period = $period;
        $voucherName->total_voucher_qty = $total_voucher_qty;
        $voucherName->expired_date = $expired_date;
        $voucherName->active =$status;
        $voucherName->save();

        $alert="success";
        $message="Master Voucher is already updated.";

        return redirect('/vouchernames')->with($alert,$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VoucherName  $voucherName
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoucherName $voucherName)
    {
        //
    }
}
