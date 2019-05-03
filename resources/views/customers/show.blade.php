@extends('layouts.app')

@section('content')
<!-- Breadcomb area Start-->
<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-edit"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Customer</h2>
                                    <p>{{$customer->name}}</p>
                                    <p>{{$customer->email}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->
<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="20%">Code</th>
                                            <th width="40%">Voucher</th>
                                            <th width="10%">Expired</th>
                                            <th width="10%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($customer->vouchers as $voucher)
                                            <tr>
                                                <td>{{$voucher['code']}}</td>
                                                <td>{{$voucher->VoucherName['name']}}</td>
                                                <td>{{date("jS F, Y", strtotime($voucher->expired_date))}}</td>
                                                <td>{{$voucher->Status['status']}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data Table area End-->
@endsection
