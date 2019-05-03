<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('short_code');
            $table->integer('period')->nullable();
            $table->integer('generate_voucher_qty')->nullable();
            $table->integer('total_voucher_qty')->nullable();
            $table->date('expired_date')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voucher_names');
    }
}
