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
            $table->string('nama_pelanggan');
            $table->string('alamat_pelanggan');
            $table->boolean('sudah_dikirim')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}