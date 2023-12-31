<?php

namespace App\Services;

use App\Models\Filiale;
use Illuminate\Support\Facades\Request;

class ClienteService
{
    public function listaPaginate($idFiliale)
    {
        return Filiale::with(['clienti' => function($c){
            $c->with('canale');
        }])
            ->find($idFiliale)
            ->clienti()
            ->when(Request::input('search'), function ($query, $search){
                $query->where('nome', 'like', "%{$search}%")
                    ->orWhere('cognome', 'like', "%{$search}%")
                    ->orWhere('fullName', 'like', "%{$search}%")
                    ->orWhere('fullNameReverse', 'like', "%{$search}%");
            })
            ->paginate(5)
            ->withQueryString()
            ->through(fn($client) => [
                'id' => $client->id,
                'nome' => $client->nome,
                'cognome' => $client->cognome,
                'fullName' => $client->fullName,
                'fullNameReverse' => $client->fullNameReverse,
                'telefono1' => $client->telefono1,
                'telefono2' => $client->telefono2,
                'indirizzo' => $client->indirizzo,
                'citta' => $client->citta,
                'provincia' => $client->provincia,
                'cap' => $client->cap,
                'email' => $client->email,
                'dataNascita' => $client->dataNascita,
                'canale' => $client->canale->nome,
            ]);
    }
}
