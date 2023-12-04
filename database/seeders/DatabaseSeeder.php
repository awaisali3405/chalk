<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AcademicCalender;
use App\Models\Branch;
use App\Models\KeyStage;
use App\Models\Subject;
use App\Models\Supplier;
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
        // ChalknDuster Tutors
        // Unit 5, Duke of Cambridge
        // 1 - 3 Kingsley Road
        // Hounslow, TW3 1PA
        // United Kingdom
        //  Sort Code: 09-01-29
        // Acc No: 35802484
        // Company Registration Number: 11801966
        //  contact us on 02085777077 or 07535050502
        // info@chalknduster.co.uk
        // branch code

        Branch::create([
            'name' => 'ChalknDuster Tutors (Flat)',
            'account_number' => '35802484',
            'bank_name' => 'test',
            'branch_code' => '09-01-29',
            'short_code' => 'CNDT',
            'phone_number' => '02085777077',
            'email' => 'info@chalknduster.co.uk',
            'address' => 'test',
            'res_address' => 'Unit 5, Duke of Cambridge',
            'res_second_address' => '1 - 3 Kingsley Road',
            'res_third_address' => '',
            'res_town' => 'Hounslow',
            'res_country' => 'United Kingdom',
            'res_postal_code' => 'TW3 1PA',
            'company_number' => '11801966',
            'tax_type' => 'flat',
            'tax' => 12,
            'vat_reg_no' => '121212121'
        ]);

        Branch::create([
            'name' => 'ChalknDuster Tutors Ltd (Standard)',
            'account_number' => '35802484',
            'bank_name' => 'test',
            'branch_code' => '09-01-29',
            'short_code' => 'CNDT',
            'phone_number' => '02085777077',
            'email' => 'info@chalknduster.co.uk',
            'address' => 'test',
            'res_address' => 'Unit 5, Duke of Cambridge',
            'res_second_address' => '1 - 3 Kingsley Road',
            'res_third_address' => '',
            'res_town' => 'Hounslow',
            'res_country' => 'United Kingdom',
            'res_postal_code' => 'TW3 1PA',
            'company_number' => '10446966',
            'tax_type' => 'vat',
            'tax' => 20,
            'vat_reg_no' => '452 7250 02'
        ]);
        Branch::create([
            'name' => 'ChalknDuster Tutors (No Vat)',
            'account_number' => '35802484',
            'bank_name' => 'test',
            'branch_code' => '09-01-29',
            'short_code' => 'CNDT',
            'phone_number' => '02085777077',
            'email' => 'info@chalknduster.co.uk',
            'address' => 'test',
            'res_address' => 'Unit 5, Duke of Cambridge',
            'res_second_address' => '1 - 3 Kingsley Road',
            'res_third_address' => '',
            'res_town' => 'Hounslow',
            'res_country' => 'United Kingdom',
            'res_postal_code' => 'TW3 1PA',
            'company_number' => '11111111',
            'tax_type' => 'no_vat',
            'tax' => 0,
            'vat_reg_no' => '121212121'
        ]);
        Supplier::create([
            'name' => 'Supplier', 'academic_year_id' => 1
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
            [
                'name' => 'GCSE'
            ],
            [
                'name' => '11 Plus'
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
                'key_stage_id' => 2
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
                'key_stage_id' => 5
            ],
        ]);
        Subject::insert([
            [
                'name' => 'English',
                'year_id' => 1, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Math',
                'year_id' => 1, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'English',
                'year_id' => 2, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Math',
                'year_id' => 2, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'English',
                'year_id' => 3, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Math',
                'year_id' => 3, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'English',
                'year_id' => 4, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Math',
                'year_id' => 4, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'English',
                'year_id' => 5, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Math',
                'year_id' => 5, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'English',
                'year_id' => 6, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Math',
                'year_id' => 6, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'English',
                'year_id' => 7, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Math',
                'year_id' => 7, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Science',
                'year_id' => 7, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'English',
                'year_id' => 8, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Math',
                'year_id' => 8, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Science',
                'year_id' => 8, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'English',
                'year_id' => 9, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Math',
                'year_id' => 9, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Science',
                'year_id' => 9, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'English Language',
                'year_id' => 10, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Math',
                'year_id' => 10, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Physics',
                'year_id' => 10, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Chemistry',
                'year_id' => 10, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Biology',
                'year_id' => 10, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'English Language',
                'year_id' => 11, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Math',
                'year_id' => 11, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Physics',
                'year_id' => 11, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Chemistry',
                'year_id' => 11, 'rate' => 24.9,
                'book_rate' => 2
            ],
            [
                'name' => 'Biology',
                'year_id' => 11, 'rate' => 24.9,
                'book_rate' => 2
            ],

        ]);
        $this->call(AcademicSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
