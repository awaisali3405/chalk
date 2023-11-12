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
        Schema::create('staff_receipt', function (Blueprint $table) {
            $table->id();
            $table->integer('staff_id');
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->integer('salary')->default(0);
            $table->integer('deduction')->default(0);
            $table->integer('tax')->default(0);
            $table->integer('ssp')->default(0);
            $table->integer('ni')->default(0);
            $table->integer('dbs')->default(0);
            $table->integer('pension')->default(0);
            $table->integer('loan')->default(0);
            $table->integer('total')->default(0);
            $table->date('date')->nullable();
            $table->string('note')->nullable();
            $table->string('mode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_receipt');
    }
};
