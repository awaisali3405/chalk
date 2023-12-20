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
        Schema::create('branch_transfer', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('last_roll_no');
            $table->integer('last_branch_id');
            $table->integer('branch_id');
            $table->boolean('active')->default(true);
            $table->integer('academic_year_id');
            $table->integer('year_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_transfer');
    }
};
