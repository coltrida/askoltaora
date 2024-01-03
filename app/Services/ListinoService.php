<?php

namespace App\Services;

use App\Models\Listino;
use Illuminate\Http\Request;

class ListinoService
{
    public function listaPaginate()
    {
        return Listino::with('categoria', 'fornitore')
            ->when(\Illuminate\Support\Facades\Request::input('search'), function ($query, $search){
                $query->where('nome', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->withQueryString()
            ->through(fn($listino) => [
                'id' => $listino->id,
                'nome' => $listino->nome,
                'fornitore' => $listino->fornitore->nome,
                'categoria' => $listino->categoria->nome,
                'costoFormattato' => $listino->costoFormattato,
                'prezzoFormattato' => $listino->prezzoFormattato,
                'giorniTempoDiReso' => $listino->giorniTempoDiReso,
            ]);
    }

    public function addListino(Request $request)
    {
        Listino::create($request->all());
    }
}
