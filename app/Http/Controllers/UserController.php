<?php

namespace App\Http\Controllers;

use App\Services\ClienteService;
use App\Services\FilialeService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function home()
    {

    }

    public function clienti($idFiliale, ClienteService $clienteService, FilialeService $filialeService)
    {
        return Inertia::render('User/Clienti', [
            'clienti' => $clienteService->listaPaginate($idFiliale),
            'filiale' => $filialeService->filialeById($idFiliale),
            'filters' => \Illuminate\Support\Facades\Request::only('search')
        ]);
    }
}
