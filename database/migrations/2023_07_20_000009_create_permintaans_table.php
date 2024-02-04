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
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->text('cv');
            $table->text('berkas');
            $table->string('status')->default('terkirim');
            $table->boolean('setuju_kontrak')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}