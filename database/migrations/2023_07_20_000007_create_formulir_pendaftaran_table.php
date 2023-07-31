<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulirPendaftaranTable extends Migration
{
    public function up()
    {
        Schema::create('formulir_pendaftaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('admin_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();   
            $table->string('telp')->nullable();   
            $table->string('agama')->nullable();   
            $table->string('ttl')->nullable();   
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('nama_keluarga')->nullable();
            $table->string('nomor_kartu_keluarga')->nullable(); 
            $table->string('jumlah_anak')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
