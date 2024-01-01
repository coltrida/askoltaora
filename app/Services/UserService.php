<?php

namespace App\Services;

use App\Models\Filiale;
use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function lista()
    {
        return User::with('ruolo')
            ->orderBy('nome')
            ->get()
            ->map(fn($user) => [
                'id' => $user->id,
                'nome' => $user->nome,
                'email' => $user->email,
                'ruolo' => $user->ruolo->nome,
            ]);
    }

    public function addPersonale(Request $request)
    {
        User::create($request->all());
    }

    public function personaleNonAssociato()
    {
        return User::doesntHave('filiali')->get();
    }

    public function associazioni()
    {
        return Filiale::with('users')->get();
    }

    public function addAssocia(Request $request)
    {
        User::find($request->idUser)->filiali()->attach($request->filiali);
    }

    public function deAssocia($idFiliale, $idUser)
    {
        Filiale::find($idFiliale)->users()->detach($idUser);
    }
}
