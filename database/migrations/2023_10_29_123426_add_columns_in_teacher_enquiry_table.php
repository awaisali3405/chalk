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
        Schema::table('teacher_enquiry', function (Blueprint $table) {
            $table->boolean('cv_check')->default(false);
            $table->boolean('dbs_check')->default(false);
            $table->boolean('password_check')->default(false);
            $table->boolean('visa_check')->default(false);
            $table->boolean('n1_check')->default(false);
            $table->boolean('document_check')->default(false);
            $table->boolean('refrence_check')->default(false);
            $table->boolean('address_check')->default(false);
            $table->boolean('hs_check')->default(false);
            $table->boolean('application_check')->default(false);
            $table->boolean('work_check')->default(false);
            $table->boolean('rule_responsibility_check')->default(false);
            $table->string('cv_document')->nullable();
            $table->string('dbs_document')->nullable();
            $table->string('password_document')->nullable();
            $table->string('visa_document')->nullable();
            $table->string('n1_document')->nullable();
            $table->string('document_document')->nullable();
            $table->string('refrence_document')->nullable();
            $table->string('address_document')->nullable();
            $table->string('hs_document')->nullable();
            $table->string('application_document')->nullable();
            $table->string('work_document')->nullable();
            $table->string('rule_responsibility_document')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teacher_enquiry', function (Blueprint $table) {
            //
        });
    }
};
