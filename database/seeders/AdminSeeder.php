<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $admins = [
        //     [
        //         'name' => 'Admin',
        //         'username' => 'admin',
        //         'password' => bcrypt('admin123'),
        //         'phone_number' => '081234567890',
        //     ],
        // ];
        
        $admins = [
            [
                'code_admin' => 'ADM001',
                'name' => 'Jaka Sembung',
                'username' => 'jaka123',
                'password' => bcrypt('jaka123'),
                'phone_number' => '081234567890',
            ],
        ];
        foreach ($admins as $admin) {
            \App\Models\Admin::create($admin);
        }
    }
}
