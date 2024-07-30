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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_siswa');
            $table->string('alamat_siswa')->nullable();
            $table->string('kelas');
            $table->text('eskul');
            $table->boolean('disetujui')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}