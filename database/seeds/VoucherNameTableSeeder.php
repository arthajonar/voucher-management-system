<?php

use Illuminate\Database\Seeder;

class VoucherNameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('voucher_names')->insert([
            [
                'name'  => 'Voucher 100% FREE survey charge for moving service in Area Surabaya',
                'short_code' => 'JPSBY',
                'period' => 30,
                'expired_date'  => Carbon\Carbon::now()->addDays(30),
                'total_voucher_qty'  => 100,
                'active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],[
                'name'  => 'Voucher 100% FREE survey charge for moving service in Area Jakarta',
                'short_code' => 'JPJKT',
                'period' => 30,
                'expired_date'  => Carbon\Carbon::now()->addDays(30),
                'total_voucher_qty'  => 100,
                'active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
