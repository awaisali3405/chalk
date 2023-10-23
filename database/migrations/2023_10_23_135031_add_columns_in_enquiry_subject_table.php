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
        Schema::table('enquiry_subject', function (Blueprint $table) {
            $table->integer('lesson_type_id')->nullable();
            $table->decimal('rate_per_hr')->nullable();
            $table->integer('no_hr_weekly')->nullable();
            $table->integer('no_weeks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiry_subject', function (Blueprint $table) {
            //
        });
    }
};
