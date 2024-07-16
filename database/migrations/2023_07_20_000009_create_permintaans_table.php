<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaansTable extends Migration
{
    public function up()
    {
        Schema::create('permintaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penyidik');
            $table->string('nama_tersangka');
            $table->string('saksi');
            $table->text('bukti');
            $table->string('berkas');
            $table->boolean('kelengkapan')->default(0); // Using boolean for kelengkapan: 0 for 'Tidak Lengkap', 1 for 'Lengkap'
            $table->timestamps();
            $table->softDeletes();
        });
    }
}