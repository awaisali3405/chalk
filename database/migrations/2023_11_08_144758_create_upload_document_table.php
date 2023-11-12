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
        Schema::create('upload_document', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('upload_document')->insert([
            ['name' => 'CV'],
            ['name' => 'DBS'],
            ['name' => 'Passport'],
            ['name' => 'Visa'],
            ['name' => 'N1 Document'],
            ['name' => 'Education'],
            ['name' => 'Reference'],
            ['name' => 'Address Document'],
            ['name' => 'H & S Document'],
            ['name' => 'Application Form'],
            ['name' => 'Rules & Responsibilities'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_document');
    }
};
