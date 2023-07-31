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
            $table->decimal('harga', 15, 2)->nullable();
            $table->longText('deskripsi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
