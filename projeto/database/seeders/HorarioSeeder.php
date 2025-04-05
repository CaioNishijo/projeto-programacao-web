<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Horario::insert([
            ['horario' => '08:00:00'],
            ['horario' => '09:00:00'],
            ['horario' => '10:00:00'],
            ['horario' => '11:00:00'],
            ['horario' => '12:00:00'],
        ]);
    }
}
