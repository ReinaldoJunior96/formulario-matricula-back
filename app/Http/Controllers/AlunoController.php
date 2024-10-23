<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Services\AlunoService;
use App\Http\Requests\StoreAlunoRequest; // Importe a Form Request personalizada

class AlunoController extends Controller
{
    protected $alunoService;

    public function __construct(AlunoService $alunoService)
    {
        $this->alunoService = $alunoService;
    }

    public function getAll()
    {
        return response()->json($this->alunoService->getAll());
    }

    // Aqui, usamos o StoreAlunoRequest para validar os dados
    public function store(AlunoRequest $request)
    {
        // A validação acontece automaticamente, então, se chegou aqui, os dados são válidos
        $aluno = $this->alunoService->store($request);

        // Retorne a resposta de sucesso
        return response()->json($aluno, 201);
    }
}
