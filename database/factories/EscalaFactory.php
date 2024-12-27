<?php

namespace Database\Factories;
use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Escala>
 */
class EscalaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'data' => $this->faker->date,
            'quantidade' => $this->faker->numberBetween(0, 10),
            'id_medico' => Medico::factory()->create()->id_user,
        ];
    }
}
