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
        Schema::create('hmrc', function (Blueprint $table) {
            $table->id();
            $table->string('payment_type');
            $table->decimal('amount')->default(0);
            $table->decimal('discount')->default(0);
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hmrc');
    }
};
