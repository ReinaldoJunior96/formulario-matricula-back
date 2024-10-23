<?php

namespace Database\Factories;

use App\Models\Diagnostico;
use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiagnosticoFactory extends Factory
{
    protected $model = Diagnostico::class;

    public function definition()
    {
        return [
            'aluno_id' => Aluno::factory(),
            'diagnostico' => $this->faker->word(),
            'epilepsia' => $this->faker->boolean(),
            'deficiencia_intelectual' => $this->faker->boolean(),
            'alergia' => $this->faker->boolean(),
            'outros' => $this->faker->sentence(),
            'atendente_terapeutico' => $this->faker->boolean(),
            'responsavel' => $this->faker->name(),
            'email_responsavel' => $this->faker->safeEmail(),
            'telefone_responsavel' => $this->faker->phoneNumber(),
        ];
    }
}
