<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Permintaan Barang
        Schema::create('permintaans', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id')->constrained('users');
            $table->string('jumlah');
            $table->string('spesifikasi');
            $table->string('deskripsi');
            $table->string('status')->default('pending');
            $table->string('status_direktur')->nullable();
            $table->string('nama_direktur')->nullable();
            $table->string('catatan_direktur')->nullable();
            $table->timestamp('tanggal_disetujui_direktur')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interviews');
    }
}
