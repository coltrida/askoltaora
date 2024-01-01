<?php

namespace App\Services;

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
}
