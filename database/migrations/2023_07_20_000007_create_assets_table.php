<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            // $table->longText('deskripsi')->nullable();
            $table->longText('harga')->nullable();
            // $table->timestamp('waktu_dan_jam')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
