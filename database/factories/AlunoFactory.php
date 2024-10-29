<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Diagnostico;
use App\Models\Avaliacao;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlunoFactory extends Factory
{
    protected $model = Aluno::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'idade' => $this->faker->numberBetween(6, 18),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'tipo_cadastro' => $this->faker->randomElement(['matricula', 'rematricula']),
            'serie_2025' => '5º Ano',
            'modalidade' => $this->faker->randomElement(['vespertino', 'matutino', 'integral']),
            'nome_mae' => $this->faker->name('female'),
            'responsavel_financeiro' => $this->faker->name(),
            'telefone' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'senha_cadastro' => Str::random(8),
            'possui_deficiencia' => $this->faker->boolean(),
        ];
    }

    // Relacionamento: um diagnóstico e várias avaliações
    public function configure()
    {
        return $this->afterCreating(function (Aluno $aluno) {
            // Cria um diagnóstico para o aluno
            Diagnostico::factory()->for($aluno)->create();

            // Cria várias avaliações para o aluno
            Avaliacao::factory()->count(3)->for($aluno)->create(); // Aqui o aluno_id será corretamente associado
        });
    }
}
