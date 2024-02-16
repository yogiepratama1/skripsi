<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembaliansTable extends Migration
{
    public function up()
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('barang_id')->constrained('permintaans');
            $table->string('alasan');
            $table->string('status')->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
