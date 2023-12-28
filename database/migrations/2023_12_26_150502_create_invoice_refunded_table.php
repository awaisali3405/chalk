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
        Schema::create('invoice_refunded', function (Blueprint $table) {
            $table->id();
            $table->integer('refund_id');
            $table->string('description')->nullable();
            $table->decimal('amount')->default(0);
            $table->date('date');
            $table->integer('transfer_invoice_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_refunded');
    }
};
