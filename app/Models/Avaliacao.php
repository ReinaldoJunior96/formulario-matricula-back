<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;
    protected $table = 'avaliacoes';

    protected $fillable = [
        'aluno_id',
        'categoria',
        'pergunta',
        'resposta',
        'pontuacao',
    ];

    // Relacionamento com Aluno (muitos para um)
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
