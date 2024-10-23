<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\AvaliacaoController;

// Rotas para Alunos
Route::get('/alunos', [AlunoController::class, 'getAll']);
Route::post('/alunos', [AlunoController::class, 'store']);

// Rotas para Diagnosticos
Route::get('/diagnosticos', [DiagnosticoController::class, 'getAll']);
Route::post('/diagnosticos', [DiagnosticoController::class, 'store']);

// Rotas para Avaliacoes
Route::get('/avaliacoes', [AvaliacaoController::class, 'getAll']);
Route::post('/avaliacoes', [AvaliacaoController::class, 'store']);
