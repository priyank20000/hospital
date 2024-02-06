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
        Schema::create('add_customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_number')->unique();
            $table->string('address');
            $table->string('doctor_name');
            $table->string('doctor_address');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_customers');
    }
};
