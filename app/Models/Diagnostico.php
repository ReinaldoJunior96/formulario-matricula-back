<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'diagnostico',
        'epilepsia',
        'deficiencia_intelectual',
        'alergia',
        'outros',
        'atendente_terapeutico',
        'responsavel',
        'email_responsavel',
        'telefone_responsavel',
    ];

    // Relacionamento com Aluno (muitos para um)
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
