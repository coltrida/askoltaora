<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Statoapa;

class StatoApaService
{
    public function lista()
    {
        return Statoapa::get();
    }

    public function addStatoApa(Request $request)
    {
        Statoapa::create($request->all());
    }
}
