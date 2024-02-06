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
        Schema::create('dr_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();

            $table->string('firstname');
            $table->string('lastname');
            $table->string('phonenumber');
            $table->string('gender');
            $table->date('dob');
            $table->text('about_me')->nullable();
            $table->string('clinic_name')->nullable();
            $table->string('clinic_address')->nullable();
            $table->string('clinic_image')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state_province')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('services')->nullable();
            $table->string('salary');
            $table->string('degree')->nullable();
            $table->string('college_institute')->nullable();
            $table->date('year_of_completion')->nullable();
            $table->string('awards')->nullable();
            $table->date('year_of_awards')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dr_profiles');
    }
};
