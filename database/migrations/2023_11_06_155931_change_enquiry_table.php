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
        Schema::table('enquiry', function (Blueprint $table) {
            $table->string('phone_no')->nullable()->change();
            $table->string('know_about_us')->nullable()->change();
            $table->string('mobile_no')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiry', function (Blueprint $table) {
            //
        });
    }
};
