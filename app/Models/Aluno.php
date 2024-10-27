<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'idade',
        'sexo',
        'tipo_cadastro',
        'serie_2025',
        'modalidade',
        'nome_mae',
        'responsavel_financeiro',
        'telefone',
        'email',
        'possui_deficiencia',
    ];

    // Relacionamento com Diagnostico (um para muitos)
    public function diagnosticos()
    {
        return $this->hasMany(Diagnostico::class);
    }

    // Relacionamento com Avaliacao (um para muitos)
    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class);
    }
}
