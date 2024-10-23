<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Avaliacao;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvaliacaoFactory extends Factory
{
    protected $model = Avaliacao::class;

    public function definition()
    {
        return [
            'aluno_id' => Aluno::factory(), // Gera um aluno automaticamente se não for fornecido
            'categoria' => $this->faker->randomElement(['Comportamental', 'Acadêmico']),
            'pergunta' => $this->faker->sentence(),
            'resposta' => $this->faker->randomElement(['S', 'AV', 'N']),
            'pontuacao' => $this->faker->numberBetween(1, 10),
        ];
    }
}
