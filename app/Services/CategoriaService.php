<?php

namespace App\Services;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaService
{
    public function lista()
    {
        return Categoria::get();
    }

    public function addCategoria(Request $request)
    {
        Categoria::create($request->all());
    }
}
