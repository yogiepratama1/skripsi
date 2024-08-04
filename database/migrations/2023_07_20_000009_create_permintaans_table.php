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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('judul');
            $table->string('deskripsi');
            $table->dateTime('tanggal_pelatihan')->nullable();
            $table->string('status')->default('Menunggu Persetujuan');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}