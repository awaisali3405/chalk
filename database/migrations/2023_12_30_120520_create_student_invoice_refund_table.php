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
        Schema::create('student_invoice_refund', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->decimal('amount')->default(0);
            $table->decimal('discount')->default(0);
            $table->string('description')->nullable();
            $table->date('date');
            $table->integer('academic_year_id')->default(1);
            $table->integer('branch_id')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_invoice_refund');
    }
};
