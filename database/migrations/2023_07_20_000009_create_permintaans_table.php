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
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama_pelanggan');
            $table->string('nama_frontdesk')->nullable();
            $table->text('keluhan');
            $table->string('motor');
            $table->string('nomor_polisi');
            $table->double('biaya_service')->nullable();
            $table->string('status')->default('reservasi');
            $table->timestamp('tanggal_diproses')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
