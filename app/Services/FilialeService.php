<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Filiale;

class FilialeService
{
    public function addFiliale(Request $request)
    {
        Filiale::create($request->all());
    }

    public function filialeById($idFiliale)
    {
        return Filiale::find($idFiliale);
    }
}
