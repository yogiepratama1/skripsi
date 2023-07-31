<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerancangansTable extends Migration
{
    public function up()
    {
        Schema::create('perancangans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('permintaan_id')->constrained('permintaans');
            $table->string('bahan_bangunan')->nullable();
            $table->string('sistem_konstruksi')->nullable();
            $table->string('struktur_bangunan')->nullable();
            $table->string('gambar_bangunan')->nullable();
            $table->double('biaya')->nullable();
            $table->integer('setuju')->default(0);
            $table->boolean('mulai_konstruksi')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}