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
        Schema::table('staff_receipt', function (Blueprint $table) {
            $table->decimal('student_loan')->default(0);
            $table->decimal('employer_ni')->default(0);
            $table->decimal('employer_pension')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff_receipt', function (Blueprint $table) {
            //
        });
    }
};
