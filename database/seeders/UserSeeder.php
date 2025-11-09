<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'name' => 'Admin Super',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin123'),
            'role' => 'admin'
            ],
            [
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('Petugas1212'),
            'role' => 'petugas'
            ],
            [
            'name' => 'Guru jasmine',
            'email' => 'guru@gmail.com',
            'password' => Hash::make('Guru123'),
            'role' => 'guru'
            ]
        ]);
    }
}
