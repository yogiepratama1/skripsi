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
            $table->string('user_id')->nullable();
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('barang');
            $table->integer('jumlah');
            $table->double('total_harga');
            $table->integer('kepuasan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
