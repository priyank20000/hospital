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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('address');
            $table->string('contact_number');
            $table->string('emergency_contact_name');
            $table->string('emergency_relationship');
            $table->string('emergency_contact_number');
            $table->text('medical_history')->nullable();
            $table->text('allergies')->nullable();
            $table->text('current_medications')->nullable();
            $table->text('known_medical_conditions')->nullable();
            $table->string('insurance_provider')->nullable();
            $table->string('policy_number')->nullable();
            $table->string('emergency_contact_insurance')->nullable();
            $table->string('primary_care_physician_name')->nullable();
            $table->string('primary_care_physician_contact')->nullable();
            $table->text('reason_for_admission')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
