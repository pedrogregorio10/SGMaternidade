<?php

namespace Database\Factories;
use App\Models\Medico;
use App\Models\Escala;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agendamento>
 */
class AgendamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'data_nascimento' => $this->faker->date,
            'n_bi' => $this->faker->unique()->numerify('#########'),
            'provincia' => $this->faker->city,
            'municipio' => $this->faker->city,
            'telefone' => $this->faker->phoneNumber,
            'estado' => $this->faker->randomElement(['solteiro/a', 'casado/a']),
            'tipo' => $this->faker->randomElement(['pos', 'pre']),
            'id_medico' => Medico::factory()->create()->id_user,
            'id_escala' => Escala::factory()->create()->id,
            'status' => $this->faker->randomElement(['confirmado', 'cancelado']),
            'observacoes' => $this->faker->sentence,
        ];
    }
}
