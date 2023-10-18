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
        Schema::table('student_invoice_receipt', function (Blueprint $table) {
            $table->decimal('amount');
            $table->decimal('discount');
            $table->decimal('late_fee');
            $table->date('date');
            $table->string('description');
            $table->string('mode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_invoice_receipt', function (Blueprint $table) {
            //
        });
    }
};
