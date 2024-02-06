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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_name');
            $table->string('packing');
            $table->string('batch_id');
            $table->integer('quantity');
            $table->string('expiry_date');
            $table->decimal('mrp', 8, 2);
            $table->decimal('rate', 8, 2);
            $table->string('paytype');
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
