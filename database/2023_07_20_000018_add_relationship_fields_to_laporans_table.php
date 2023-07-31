<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLaporansTable extends Migration
{
    public function up()
    {
        Schema::table('laporans', function (Blueprint $table) {
            $table->unsignedBigInteger('permintaan_id')->nullable();
            $table->foreign('permintaan_id')->references('id')->on('permintaans')->onDelete('cascade');
        });
    }
}