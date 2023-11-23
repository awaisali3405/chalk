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
        Schema::table('attendance', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('enquiry', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('enquiry_upload', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('enquiry_subject', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('expense', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('expense_account_type', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('general_notification', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('general_notification_people', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('refund', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('salary_invoice', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('sale', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('sale_product', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('staff', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });

        Schema::table('staff_loan', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('staff_receipt', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('staff_attendance', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('student', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('student_invoice', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('student_invoice_receipt', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('student_invoice_subject', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });

        Schema::table('supplier', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
        Schema::table('purchase', function (Blueprint $table) {
            $table->integer('academic_year_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('all', function (Blueprint $table) {
            //
        });
    }
};
