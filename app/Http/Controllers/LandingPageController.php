<?php

namespace App\Http\Controllers;

use App\VoucherName;
use Illuminate\Http\Request;


class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucherNames = VoucherName::where('active',1)->get(['id', 'name','expired_date']);

        return view('welcome',compact('voucherNames'));

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
        //
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
    public function edit(VoucherName $voucherName)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VoucherName  $voucherName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoucherName $voucherName)
    {
        //
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
