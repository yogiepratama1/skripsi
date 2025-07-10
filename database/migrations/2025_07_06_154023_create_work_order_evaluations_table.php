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
        Schema::create('work_order_evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->foreignId('work_order_id')
                ->constrained('work_orders')
                ->onDelete('cascade');
            $table->foreignId('qc_user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->json('image_paths')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_order_evaluations');
    }
};
