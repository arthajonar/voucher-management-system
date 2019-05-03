<?php

namespace App\Http\Controllers;

use App\Voucher;
use Illuminate\Http\Request;

class VoucherRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('voucherregistration');
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
        $code=($request->code);
        $voucher=Voucher::where('code',$code)->first();
        if($voucher){
            if($voucher->expired_date > now()->addDays(-1)){
                switch ($voucher->status_id) {
                    case '1':
                        $voucher->status_id = 3;
                        $voucher->save();
                        $alert="success";
                        $message = "Congratulation. Register code " .$code." is success";
                        break;
                    case '2':
                        $alert="warning";
                        $message = $code." expired at ".date("jS F, Y", strtotime($voucher->expired_date));
                        break;
                    case '3':
                        $alert="warning";
                        $message = $code." already used";
                        break;
                }

            } else {
                switch ($voucher->status_id) {
                    case '1':
                        $voucher->status_id = 2;
                        $voucher->save();

                        $alert="warning";
                        $message = $code." expired at ".date("jS F, Y", strtotime($voucher->expired_date));
                        break;
                    case '2':
                        $alert="warning";
                        $message = $code." expired at ".date("jS F, Y", strtotime($voucher->expired_date));
                        break;
                    case '3':
                        $alert="warning";
                        $message = $code." already used";
                        break;
                }
            }
        }else{
            $alert="warning";
            $message= $code." is not valid";
        }


        return redirect('voucher-register')->with($alert,$message);
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
