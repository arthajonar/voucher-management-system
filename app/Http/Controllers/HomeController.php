<?php

namespace App\Http\Controllers;

use App\Voucher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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
}
