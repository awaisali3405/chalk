<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AcademicCalender;
use App\Models\Branch;
use App\Models\KeyStage;
use App\Models\Subject;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role_id' => 3
        ]);
        DB::table('role')->insert([
            ['name' => 'parent'],
            ['name' => 'admin'],
            ['name' => 'super admin'],
            ['name' => 'teacher'],
        ]);
        AcademicCalender::create([
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'active' => 1
        ]);
        Branch::create([
            'name' => 'test',
            'account_number' => 'test',
            'bank_name' => 'test',
            'short_code' => 'test',
            'phone_number' => '21122112',
            'email' => 'test@gmail.com',
            'address' => 'test',
            'res_address' => 'test',
            'res_second_address' => 'test',
            'res_third_address' => 'test',
            'res_town' => 'test',
            'res_country' => 'test',
            'res_postal_code' => 'test',
            'company_number' => 'test',
            'tax_type' => 'flat',
            'tax' => 12
        ]);
        KeyStage::insert([
            [
                'name' => 'Key Stage 1'
            ],
            [
                'name' => 'Key Stage 2'
            ],
            [
                'name' => 'Key Stage 3'
            ],
        ]);
        Year::insert([
            [
                'name' => 'Year 1',
                'key_stage_id' => 1
            ],
            [
                'name' => 'Year 2',
                'key_stage_id' => 1
            ],
            [
                'name' => 'Year 3',
                'key_stage_id' => 1
            ],
            [
                'name' => 'Year 4',
                'key_stage_id' => 2
            ],
            [
                'name' => 'Year 5',
                'key_stage_id' => 2
            ],
            [
                'name' => 'Year 6',
                'key_stage_id' => 2
            ],
            [
                'name' => 'Year 7',
                'key_stage_id' => 3
            ],
            [
                'name' => 'Year 8',
                'key_stage_id' => 3
            ],
            [
                'name' => 'Year 9',
                'key_stage_id' => 3
            ],
            [
                'name' => 'Year 10',
                'key_stage_id' => 4
            ],
            [
                'name' => 'Year 11',
                'key_stage_id' => 4
            ],
            [
                'name' => 'Year 12',
                'key_stage_id' => 4
            ],
        ]);
        Subject::insert([
            [
                'name' => 'subject1',
                'year_id' => 1, 'rate' => 12,
                'book_rate' => 13
            ],
            [
                'name' => 'subject2',
                'year_id' => 2, 'rate' => 12,
                'book_rate' => 14
            ],
            [
                'name' => 'subject2',
                'year_id' => 2, 'rate' => 12,
                'book_rate' => 15
            ],
            [
                'name' => 'subject3',
                'year_id' => 3, 'rate' => 12,
                'book_rate' => 16
            ],
            [
                'name' => 'subject4',
                'year_id' => 4, 'rate' => 12,
                'book_rate' => 17
            ],
            [
                'name' => 'subject5',
                'year_id' => 5, 'rate' => 12,
                'book_rate' => 18
            ],
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
