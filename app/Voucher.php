<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function Customer(){
        return $this->belongsTo('App\Customer');
    }

    public function VoucherName(){
        return $this->belongsTo('App\VoucherName');
    }

    public function Status(){
        return $this->belongsTo('App\StatusList');
    }

}
