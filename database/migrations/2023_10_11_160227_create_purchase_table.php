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
        Schema::create('purchase', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id');
            $table->integer('supplier_id');
            $table->integer('year_id');
            $table->integer('key_stage_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->integer('rate');
            $table->integer('amount');
            $table->integer('mode');
            $table->integer('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase');
    }
};
