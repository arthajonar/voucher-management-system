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
                                    <h2>Voucher</h2>
                                    <p>List of Voucher</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a class="btn btn-success" href="{{action('VoucherListController@create')}}" role="button">
                                        <i class="notika-icon notika-edit"></i> Create Voucher
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
                                    <th>No</th>
                                    <th width="3%">Code</th>
                                    <th width="30%">Voucher</th>
                                    <th >Customer</th>
                                    <th >Email</th>
                                    <th>Expired</th>
                                    <th width="10%">Status</th>
                                    <th width="30%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vouchers as $voucher)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$voucher['code']}}</td>
                                        <td width="20%">{{$voucher->VoucherName['name']}}</td>
                                        <td  width="5%">{{$voucher->Customer['name']}}</td>
                                        <td width="5%">{{$voucher->Customer['email']}}</td>
                                        <td  width="10%">{{date("jS F, Y", strtotime($voucher->expired_date))}}</td>
                                        <td>{{$voucher->Status['status']}}</td>
                                        <td>
                                            @if ($voucher->status_id == 1)
                                                <form action="{{action('VoucherListController@destroy', $voucher->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <a href="{{action('VoucherListController@edit', $voucher['id'])}}" class="btn btn-warning">Update Status</a>
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            @else
                                                <form action="{{action('VoucherListController@destroy', $voucher->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <a href="{{action('VoucherListController@edit', $voucher['id'])}}" class="btn btn-warning disabled" >Update Status</a>
                                                    <button class="btn btn-danger" type="submit" disabled>Delete</button>
                                                </form>
                                            @endif

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
