<?php

namespace Database\Seeders;

use App\Models\AcademicCalender;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 04-09-2023 - 01-09-2024
        // 29-8-2022 - 03-09-2023
        AcademicCalender::insert([
            [
                'start_date' => Carbon::create('2023', '09', '04'),
                'end_date' =>  Carbon::create('2024', '09', '01'),
                'active' => 1
            ],
            [
                'start_date' => Carbon::create('2022', '08', '29'),
                'end_date' =>  Carbon::create('2023', '09', '03'),
                'active' => 0
            ],


        ]);
    }
}
