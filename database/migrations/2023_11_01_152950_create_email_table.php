<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('email', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('template')->nullable();
            $table->timestamps();
        });
        DB::table('email')->insert([
            ['name' => 'Email'],
            ['name' => "Sign Up Email"],
            ['name' => "1st Reminder"],
            ['name' => "2nd Reminder"],
            ['name' => "3rd Reminder"],
            ['name' => "Final Reminder"],
            ['name' => "Interview"],
            ['name' => "Login Detail"],
            ['name' => "Announcement"],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email');
    }
};
