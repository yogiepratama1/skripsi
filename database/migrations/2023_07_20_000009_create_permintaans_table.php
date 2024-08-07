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
            $table->string('nama_pelanggan');
            $table->string('email_pelanggan');
            $table->string('alamat_pelanggan')->nullable();
            $table->integer('jumlah');
            $table->text('produk');
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}