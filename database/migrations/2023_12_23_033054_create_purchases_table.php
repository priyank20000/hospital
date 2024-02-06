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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->string('medicine_name'); 
            $table->string('invoice_number');
            $table->string('paytype');
            $table->date('invoice_date');
            $table->string('packing'); // Add the new field 'packing'
            $table->string('batch_id'); // Add the new field 'batch_id'
            $table->string('expiry_date'); // Add the new field 'expiry_date'
            $table->integer('quantity'); // Add the new field 'quantity'
            $table->decimal('mrp', 8, 2); // Add the new field 'mrp'
            $table->decimal('rate', 8, 2); // Add the new field 'rate'
            $table->decimal('amount', 8, 2); // Add the new field 'amount'
            // Add other columns as needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
