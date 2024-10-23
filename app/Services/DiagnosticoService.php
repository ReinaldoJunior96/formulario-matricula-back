<?php

namespace App\Services;

use App\Models\Diagnostico;

class DiagnosticoService
{
    public function getAll()
    {
        return Diagnostico::all();
    }

    public function store(array $data)
    {
        return Diagnostico::create($data);
    }
}
