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

            $table->string('enquiry_id')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('phone_no');
            $table->string('gender');
            $table->string('nationality');
            $table->string('place_of_birth')->nullable();
            $table->string('main_language');
            $table->string('other_language')->nullable();
            $table->date('dob');
            $table->string('current_school_name')->nullable();
            $table->date('current_year')->nullable();
            $table->integer('branch_id')->nullable();
            $table->string('payment_period')->nullable();
            $table->integer('year_id')->nullable();
            $table->integer('key_stage_id')->nullable();
            $table->string('lesson_type')->nullable();
            $table->date('admission_date')->nullable();
            $table->decimal('deposit')->nullable();
            $table->decimal('registration_fee')->nullable();
            $table->decimal('annual_resource_fee')->nullable();
            $table->decimal('resource_discount')->nullable();
            $table->decimal('exercise_book_fee')->nullable();
            $table->decimal('fee')->nullable();
            $table->decimal('fee_discount')->nullable();
            $table->text('note')->nullable();
            $table->text('note_files')->nullable();
            $table->string('ethic_group')->nullable();
            $table->string('religion')->nullable();
            $table->string('o_full_name_1')->nullable();
            $table->string('o_work_phone_1')->nullable();
            $table->string('o_relationship_1')->nullable();
            $table->string('o_mobile_phone_1')->nullable();
            $table->string('o_work_place_1')->nullable();
            $table->string('o_full_name_2')->nullable();
            $table->string('o_work_phone_2')->nullable();
            $table->string('o_relationship_2')->nullable();
            $table->string('o_mobile_phone_2')->nullable();
            $table->string('o_work_place_2')->nullable();
            $table->string('e_full_name_1')->nullable();
            $table->string('e_work_phone_1')->nullable();
            $table->string('e_relationship_1')->nullable();
            $table->string('e_mobile_phone_1')->nullable();
            $table->string('e_contact_info_1')->nullable();
            $table->string('e_full_name_2')->nullable();
            $table->string('e_work_phone_2')->nullable();
            $table->string('e_relationship_2')->nullable();
            $table->string('e_mobile_phone_2')->nullable();
            $table->string('e_contact_info_2')->nullable();
            $table->boolean('is_disable')->default(false);
            $table->string('disorder_detail')->nullable();
            $table->string('signature_person')->nullable();
            $table->string('know_about_us')->nullable();
            $table->string('feedback')->nullable();
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
