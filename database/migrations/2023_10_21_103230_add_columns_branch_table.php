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
        Schema::table('branch', function (Blueprint $table) {
            $table->string('res_address')->nullable();
            $table->string('res_second_address')->nullable();
            $table->string('res_third_address')->nullable();
            $table->string('res_town')->nullable();
            $table->string('res_country')->nullable();
            $table->string('res_postal_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('branch', function (Blueprint $table) {
            //
        });
    }
};
