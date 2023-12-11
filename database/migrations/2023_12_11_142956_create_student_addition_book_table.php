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
        Schema::create('student_addition_book', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->integer('subject_id')->nullable();
            $table->string('book_name')->nullable();
            $table->integer('quantity')->default(0);
            $table->decimal('rate')->default(0);
            $table->integer('academic_year_id')->default(1);
            $table->integer('branch_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_addition_book');
    }
};
