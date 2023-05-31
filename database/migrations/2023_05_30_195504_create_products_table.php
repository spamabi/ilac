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
        Schema::create('products', function (Blueprint $table) {

            $table->id();
            $table->string('product_name');
            $table->date('waybill_date');
            $table->string('waybill_number');
            $table->date('invoice_date');
            $table->string('bill_number');
            $table->string('movement_direction');
            $table->string('dispatch_place');
            $table->string('unit');
            $table->string('output_quantity');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
