<?php

namespace App\Services;

use App\Models\Avaliacao;

class AvaliacaoService
{
    public function getAll()
    {
        return Avaliacao::all();
    }

    public function store(array $data)
    {
        return Avaliacao::create($data);
    }
}
