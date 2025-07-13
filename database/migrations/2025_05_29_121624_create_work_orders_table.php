<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->foreignId('coordinator_id')->nullable();
            $table->foreignId('customer_id')->nullable();
            $table->string('status');
            $table->integer('estimated_duration')->nullable(); // in hours
            $table->string('location');
            $table->string('installation_type');
            $table->text('description')->nullable();
            $table->timestamp('installation_date')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('customer_signed_file_path')->nullable();
            // $table->json('results')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_orders');
    }
};
