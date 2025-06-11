<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Caio",
            'email' => "caio@email.com", 
            'password' => Hash::make("12345678"), 
            'role' => 'ADM',
        ]);

        User::create([
            'name' => "Vitor",
            'email' => "vitor@email.com", 
            'password' => Hash::make("12345678"), 
            'role' => 'ADM',
        ]);
    }
}
