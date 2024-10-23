<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use Illuminate\Http\Request;
use App\Services\AvaliacaoService;

class AvaliacaoController extends Controller
{
    protected $avaliacaoService;

    public function __construct(AvaliacaoService $avaliacaoService)
    {
        $this->avaliacaoService = $avaliacaoService;
    }

    public function getAll()
    {
        return response()->json($this->avaliacaoService->getAll());
    }

    public function store(Request $request)
    {
        $avaliacao = $this->avaliacaoService->store($request->all());
        return response()->json($avaliacao, 201);
    }
}
