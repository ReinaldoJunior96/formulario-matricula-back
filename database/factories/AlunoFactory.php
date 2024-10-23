<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Diagnostico;
use App\Models\Avaliacao;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'modalidade' => $this->faker->randomElement(['integral', 'parcial']),
            'turno' => $this->faker->randomElement(['manha', 'tarde']),
            'nome_mae' => $this->faker->name('female'),
            'responsavel_financeiro' => $this->faker->name(),
            'telefone' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
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
