<?php

namespace App\Services;

use App\Models\Dottore;
use Illuminate\Http\Request;

class DottoreService
{
    public function listaPaginate()
    {
        return Dottore::with('filiale')
            ->when(\Illuminate\Support\Facades\Request::input('search'), function ($query, $search){
                $query->where('nome', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'nome' => $user->nome,
                'citta' => $user->citta,
                'filiale' => $user->filiale->nome,
            ]);
    }

    public function addMedico(Request $request)
    {
        Dottore::create($request->all());
    }
}
