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
        Schema::create('teacher_enquiry', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('designation');
            $table->string('national_insurance_number');
            $table->string('mobile');
            $table->string('phone');
            $table->string('home_telephone');
            $table->string('email');
            $table->string('postal_code');
            $table->string('address');
            $table->integer('branch_id');
            $table->string('pic');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_enquiry');
    }
};
