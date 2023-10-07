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
        Schema::create('enquiry_subject', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id');
            $table->integer('board_id')->nullable();
            $table->integer('paper_id')->nullable();
            $table->integer('science_type_id')->nullable();
            $table->integer('enquiry_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiry_subject');
    }
};
