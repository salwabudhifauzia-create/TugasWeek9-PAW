<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@kampus.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Dosen',
            'email' => 'dosen@kampus.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);

        User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@kampus.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
        ]);
    }
}