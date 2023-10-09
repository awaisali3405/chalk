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
        Schema::create('student_invoice', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->decimal('amount');
            $table->string('type');
            $table->boolean('is_paid')->default(false);
            $table->date('from_date');
            $table->date('to_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_invoice');
    }
};
