<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{User, Medico, Escala, Paciente, Agendamento, Consulta, Prontuario};
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();
        Medico::factory()->count(10)->create();
        Escala::factory()->count(20)->create();
        Paciente::factory()->count(50)->create();
        Agendamento::factory()->count(30)->create();
        Consulta::factory()->count(20)->create();
        Prontuario::factory()->count(15)->create();
    }
}
