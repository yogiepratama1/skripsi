<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaansTable extends Migration
{
    public function up()
    {
        Schema::create('permintaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('pangkat')->nullable();
            $table->string('jabatan')->nullable();
            $table->dateTime('tanggal_lembur');
            $table->integer('jam_lembur');
            $table->string('jenis_kerja')->default('Overtime');
            $table->boolean('disetujui_karyawan')->default(false);
            $table->boolean('disetujui_officer_supplies')->default(false);
            $table->boolean('disetujui_manager')->default(false);
            $table->boolean('disetujui_semua')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
