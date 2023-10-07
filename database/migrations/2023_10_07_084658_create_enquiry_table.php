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
        Schema::create('enquiry', function (Blueprint $table) {
            $table->id();
            $table->string('caller_name');
            $table->string('relationship');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('email');
            $table->string('phone_no');
            $table->string('mobile_no');
            $table->string('address');
            $table->string('current_school_name');
            $table->integer('year_id');
            $table->integer('key_stage_id');
            $table->string('lesson_type');
            $table->integer('branch_id');
            $table->date('enquiry_date');
            $table->date('assessment_date');
            $table->time('assessment_time');
            $table->time('know_about_us');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiry');
    }
};
