<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaansTable extends Migration
{
    public function up()
    {
        Schema::create('permintaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama_pelanggan');
            $table->string('alamat_pelanggan');
            $table->unsignedBigInteger('motor');
            $table->string('nomor_polisi');
            $table->text('keluhan');
            $table->string('bukti_pembayaran')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('status')->default(0);
            $table->integer('status_acara')->default(0);
            $table->dateTime('tanggal_bayar')->nullable();
            $table->text('spareparts')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}