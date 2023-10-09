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
        Schema::create('student', function (Blueprint $table) {
            $table->id();

            $table->string('enquiry_id');
            $table->string('profile_pic');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('email');
            $table->string('phone_no');
            $table->string('post_code');
            $table->string('ethic_group')->nullable();
            $table->string('religion');
            $table->string('home_language');
            $table->string('current_school_name');
            $table->integer('year_id');
            $table->integer('key_stage_id');
            $table->string('lesson_type');
            $table->integer('branch_id');
            $table->string('payment_period');
            $table->date('admission_date');
            $table->decimal('deposit');
            $table->decimal('registration_fee');
            $table->decimal('annual_resource_fee');
            $table->decimal('resource_discount');
            $table->decimal('exercise_book_fee');
            $table->decimal('fee');
            $table->decimal('fee_discount');
            $table->text('learning')->nullable();
            $table->text('medical')->nullable();
            $table->text('awareness')->nullable();
            $table->text('note')->nullable();
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
