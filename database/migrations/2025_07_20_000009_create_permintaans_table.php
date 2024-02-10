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
            $table->foreignId('id_desain')->constrained('interviews');
            $table->string('nama');
            $table->integer('jumlah');
            $table->double('harga');
            $table->string('status')->nullable()->default('belum_diproduksi');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
