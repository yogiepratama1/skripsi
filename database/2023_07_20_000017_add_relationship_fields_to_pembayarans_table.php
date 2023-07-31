<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPembayaransTable extends Migration
{
    public function up()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            // Add the foreign key column with 'ON DELETE CASCADE'
            $table->unsignedBigInteger('permintaan_id');
            $table->foreign('permintaan_id')
                  ->references('id')
                  ->on('permintaans')
                  ->onDelete('cascade'); // Add the 'ON DELETE CASCADE' constraint
        });
    }
}
