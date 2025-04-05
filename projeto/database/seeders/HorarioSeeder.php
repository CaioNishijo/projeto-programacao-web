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
        Horario::create(['horario' => '08:00']);
        Horario::create(['horario' => '09:00']);
        Horario::create(['horario' => '10:00']);
        Horario::create(['horario' => '11:00']);
        Horario::create(['horario' => '12:00']);
    }
}
