<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('tanggal_bayar')->nullable();
            $table->decimal('harga_dibayar', 15, 2)->nullable();
            $table->string('sudah_bayar')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}