<?php

namespace App\Services;
use App\Models\Fornitore;
use Illuminate\Http\Request;

class FornitoreService
{
    public function lista()
    {
        return Fornitore::orderBy('nome')->get();
    }

    public function addFornitore(Request $request)
    {
        Fornitore::create($request->all());
    }
}
