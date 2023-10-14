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
        Schema::create('parent', function (Blueprint $table) {
            $table->id();
            // $table->string('student_id')->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('given_name');
            $table->string('gender');
            $table->string('relationship');
            $table->string('emp_status')->nullable();
            $table->string('company_name')->nullable();
            $table->string('work_phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->string('signature')->nullable();
            $table->date('signature_date')->nullable();
            // $table->string('post_code');
            $table->string('mail_address')->nullable();
            $table->string('res_address')->nullable();
            $table->string('res_second_address')->nullable();
            $table->string('res_third_address')->nullable();
            $table->string('res_town')->nullable();
            $table->string('res_country')->nullable();
            $table->string('res_postal_code')->nullable();
            // $table->string('res_postal_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_parent');
    }
};
