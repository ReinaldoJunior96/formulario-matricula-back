<?php

namespace App\Services;

use App\Http\Requests\AlunoRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\PreMatriculaRealizada;
use App\Models\Aluno;
use App\Models\Avaliacao;
use App\Models\Diagnostico;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlunoService
{
    public function getAll()
    {
        return Aluno::with(['diagnosticos', 'avaliacoes'])->get();
    }

    public function store(AlunoRequest $request)
    {

        if ($request->tipo_cadastro === "matricula") {
            $senhaGerada = "M" . Str::random(8);
        } else {
            $senhaGerada = "R" . Str::random(8);
        }


        // Variável $aluno será acessível fora da transação
        $aluno = null;

        // Usando transações para garantir que todos os dados sejam salvos corretamente
        DB::transaction(function () use ($request, &$aluno, &$senhaGerada) {
            // Primeiro, criar o aluno
            $aluno = Aluno::create(array_merge(
                $request->only([
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
                    'possui_deficiencia'
                ]),
                ['senha_cadastro' => $senhaGerada]
            ));
            // Criar os diagnósticos associados ao aluno
            foreach ($request->diagnosticos as $diagnosticoData) {
                Diagnostico::create(array_merge($diagnosticoData, ['aluno_id' => $aluno->id]));
            }

            // Criar as avaliações associadas ao aluno
            foreach ($request->avaliacoes as $avaliacaoData) {
                Avaliacao::create(array_merge($avaliacaoData, ['aluno_id' => $aluno->id]));
            }
        });

        Mail::to($aluno->email)->send(new PreMatriculaRealizada($aluno->nome, $senhaGerada));

        return response()->json([
            'message' => 'Formulário registrado com sucesso!',
            'senha_gerada' => $senhaGerada
        ], 201);
    }
}
