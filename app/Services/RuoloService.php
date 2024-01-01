<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Ruolo;

class RuoloService
{
    public function lista()
    {
        return Ruolo::whereNot('nome', 'Admin')->orderBy('nome')->get();
    }

    public function addRuolo(Request $request)
    {
        Ruolo::create($request->all());
    }
}
