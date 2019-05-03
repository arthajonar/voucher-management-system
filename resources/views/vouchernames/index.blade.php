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
                                    <h2>Master Voucher</h2>
                                    <p>List of Voucher</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a class="btn btn-success" href="{{action('VoucherNameController@create')}}" role="button">
                                        <i class="notika-icon notika-edit"></i> Add Master Voucher
                                </a>
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
                                    <th width="20%">Name</th>
                                    <th width="10%">Short Code</th>
                                    <th width="10%">Period (days)</th>
                                    <th width="5%">Voucher Used</th>
                                    <th width="10%">Total Voucher</th>
                                    <th width="10%">Expired Date</th>
                                    <th width="5%">Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($voucherNames as $voucher)
                                    <tr>
                                        <td>{{$voucher['name']}}</td>
                                        <td>{{$voucher['short_code']}}</td>
                                        <td>{{$voucher['period']}}</td>
                                        <td>{{$voucher['generate_voucher_qty']}}</td>
                                        <td>{{$voucher['total_voucher_qty']}}</td>
                                        <td>{{date("jS F, Y", strtotime($voucher->expired_date))}}</td>
                                        @if($voucher['active'] == 1)
                                            <td>Active</td>
                                        @else
                                            <td>Non-Active</td>
                                        @endif
                                        {{-- <td>{{$voucher['active']}}</td> --}}
                                        <td>
                                            <a href="{{action('VoucherNameController@edit', $voucher['id'])}}" class="btn btn-warning">Update Status</a>
                                        </td>
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
