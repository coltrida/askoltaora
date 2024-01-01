<?php

namespace App\Services;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipologiaService
{
    public function lista()
    {
        return Tipo::get();
    }

    public function addTipologia(Request $request)
    {
        Tipo::create($request->all());
    }
}
