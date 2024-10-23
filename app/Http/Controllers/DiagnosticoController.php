<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use Illuminate\Http\Request;
use App\Services\DiagnosticoService;

class DiagnosticoController extends Controller
{
    protected $diagnosticoService;

    public function __construct(DiagnosticoService $diagnosticoService)
    {
        $this->diagnosticoService = $diagnosticoService;
    }

    public function getAll()
    {
        return response()->json($this->diagnosticoService->getAll());
    }

    public function store(Request $request)
    {
        $diagnostico = $this->diagnosticoService->store($request->all());
        return response()->json($diagnostico, 201);
    }
}
