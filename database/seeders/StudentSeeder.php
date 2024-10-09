<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name' => 'Winfrey Nainggolan',
                'nim' => '12S22001',
                'username' => 'winfrey-nainggolan',
                'password' => bcrypt('winfrey123'),
                'gender' => 'male',
                'dormitory_id' => '1',
                'phone_number' => '081234567890',
            ],
            [
                'name' => 'Yohana Siahaan',
                'nim' => '12S22003',
                'username' => 'yohana-siahaan',
                'password' => bcrypt('yohana123'),
                'gender' => 'female',
                'dormitory_id' => '2',
                'phone_number' => '081234567891',
            ], 
            [
                'name' => 'Ira Silalahi',
                'nim' => '12S22048',
                'username' => 'ira-silalahi',
                'password' => bcrypt('ira123'),
                'gender' => 'female',
                'dormitory_id' => '2',
                'phone_number' => '081234567892',
            ],
        ];
        foreach ($students as $student) {
            \App\Models\Student::create($student);
        }
    }
}
