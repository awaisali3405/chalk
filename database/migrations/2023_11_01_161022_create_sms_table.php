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
        Schema::create('sms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('template')->nullable();
            $table->integer('date')->nullable();
            $table->timestamps();
        });
        DB::table('sms')->insert([
            ['name' => 'Assessment'],
            ['name' => "1st Monthly"],
            ['name' => "2nd Monthly"],
            ['name' => "1st Weekly"],
            ['name' => "2nd Weekly"],
            ['name' => "Final Monthly"],
            ['name' => "Final Weekly"],
            ['name' => "Interview"],


        ]);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms');
    }
};
