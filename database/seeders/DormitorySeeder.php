<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DormitorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $dormitory = [
        //     [
        //         'name' => 'Nazareth',
        //         'gender' => 'male',
        //     ],
        //     [
        //         'name' => 'Kana',
        //         'gender'=> 'female',
        //     ],
        //     [
        //         'name' => 'Pniel',
        //         'gender' => 'male',
        //     ],
        // ];
        $dormitory = [
            [
                'name' => 'Anthokia',
                'gender' => 'male',
            ],
        ];
        foreach ($dormitory as $dorm) {
            \App\Models\Dormitory::create($dorm);
        }
    }
}
