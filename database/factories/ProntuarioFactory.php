<?php

namespace Database\Factories;
use App\Models\Consulta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prontuario>
 */
class ProntuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_consulta' => Consulta::factory()->create()->id,
            'diagnostico' => $this->faker->sentence,
            'tratamento' => $this->faker->paragraph,
            'exames_solicitados' => $this->faker->sentence,
            'prescricao' => $this->faker->sentence,
        ];
    }
}
