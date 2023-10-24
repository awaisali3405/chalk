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
        Schema::table('student_invoice_subject', function (Blueprint $table) {
            $table->integer('subject_hr')->nullable();
            $table->decimal('subject_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_invoice_subject', function (Blueprint $table) {
            //
        });
    }
};
