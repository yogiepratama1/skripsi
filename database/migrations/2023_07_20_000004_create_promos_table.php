<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromosTable extends Migration
{
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('permintaan_id')->constrained('permintaans');
            $table->string('promo');
            $table->timestamp('tanggal_promo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}