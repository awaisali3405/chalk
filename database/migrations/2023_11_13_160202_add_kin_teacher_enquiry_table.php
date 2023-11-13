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
            $table->string('kin_name')->nullable();
            $table->string('kin_phone')->nullable();
            $table->string('kin_relation')->nullable();
            $table->string('kin_address')->nullable();
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
