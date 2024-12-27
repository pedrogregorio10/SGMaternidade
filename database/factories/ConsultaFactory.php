<?php

namespace Database\Factories;
use App\Models\Paciente;
use App\Models\Escala;
use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consulta>
 */
class ConsultaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_paciente' => Paciente::factory()->create()->id,
            'id_medico' => Medico::factory()->create()->id_user,
            'id_escala' => Escala::factory()->create()->id,
            'tipo' => $this->faker->randomElement(['pos', 'pre']),
            'status' => $this->faker->randomElement(['pendente', 'realizada', 'cancelada']),
            'motivo' => $this->faker->sentence,
            'observacoes' => $this->faker->sentence,
        ];
    }
}
