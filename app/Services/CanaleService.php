<?php

namespace App\Services;

use App\Models\Canale;
use Illuminate\Http\Request;

class CanaleService
{
    public function lista()
    {
        return Canale::get();
    }

    public function addCanale(Request $request)
    {
        Canale::create($request->all());
    }
}
