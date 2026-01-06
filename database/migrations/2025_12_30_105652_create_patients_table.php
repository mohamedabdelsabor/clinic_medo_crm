<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();

            // Personal info
            $table->string('name')->index();
            $table->string('national_id')->nullable()->unique();
            $table->enum('gender',['male','female'])->nullable();
            $table->date('birth_date')->nullable();
            $table->string('marital_status')->nullable();

            // Contact info
            $table->string('phone')->nullable()->index();
            $table->string('phone_alt')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();

            // Medical info
            $table->string('blood_type')->nullable();
            $table->text('allergies')->nullable();
            $table->text('chronic_diseases')->nullable();
            $table->text('medical_notes')->nullable();

            // Administrative
            $table->string('file_number')->nullable()->unique();
            $table->boolean('has_insurance')->default(false);
            $table->string('insurance_provider')->nullable();
            $table->date('first_visit_at')->nullable();
            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
