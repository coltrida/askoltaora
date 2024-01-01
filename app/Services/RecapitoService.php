<?php

namespace App\Services;

use App\Models\Recapito;
use Illuminate\Http\Request;

class RecapitoService
{
    public function listaPaginate()
    {
        return Recapito::with('filiale')
        ->when(\Illuminate\Support\Facades\Request::input('search'), function ($query, $search){
            $query->where('nome', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(5)
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'nome' => $user->nome,
                'indirizzo' => $user->indirizzo,
                'citta' => $user->citta,
                'provincia' => $user->provincia,
                'cap' => $user->cap,
                'telefono' => $user->telefono,
                'iban' => $user->iban,
                'filiale' => $user->filiale->nome,
            ]);
    }

    public function addRecapito(Request $request)
    {
        Recapito::create($request->all());
    }
}
