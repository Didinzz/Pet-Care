<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Dokter',
                'email' => 'dokter@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'dokter',
            ],
            [
                'name' => 'Pemilik',
                'email' => 'pemilik@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'pemilik',
            ],
        ]);
    }
}
