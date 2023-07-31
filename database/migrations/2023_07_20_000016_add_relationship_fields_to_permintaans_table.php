<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPermintaansTable extends Migration
{
    public function up()
    {
        Schema::table('permintaans', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->foreign('barang_id')->references('id')->on('assets')->onDelete('cascade');
        });
    }
}