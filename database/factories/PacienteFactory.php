<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
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
        ];
    }
}
