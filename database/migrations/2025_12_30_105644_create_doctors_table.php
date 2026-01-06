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
        Schema::create('doctors', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('specialty');
    $table->string('degree')->nullable();
    $table->string('phone')->nullable();
    $table->string('email')->nullable();
    $table->string('room_number')->nullable();
    $table->json('working_days')->nullable();
    $table->time('start_time')->nullable();
    $table->time('end_time')->nullable();
    $table->decimal('consultation_fee',8,2)->nullable();
    $table->boolean('status')->default(true);
    $table->text('notes')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
