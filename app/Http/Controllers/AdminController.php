<?php

namespace App\Http\Controllers;

use App\Services\FilialeService;
use App\Services\FornitoreService;
use App\Services\RuoloService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function home()
    {
        return Inertia::render('Admin/Home');
    }

    public function ruoli(RuoloService $ruoloService)
    {
        return Inertia::render('Admin/Ruoli', [
            'ruoli' => $ruoloService->lista()
        ]);
    }

    public function addRuolo(Request $request, RuoloService $ruoloService)
    {
        $ruoloService->addRuolo($request);
    }

    public function filiali()
    {
        return Inertia::render('Admin/Filiali');
    }

    public function addFiliali(Request $request, FilialeService $filialeService)
    {
        $filialeService->addFiliale($request);
    }

    public function fornitori(FornitoreService $fornitoreService)
    {
        return Inertia::render('Admin/Fornitori', [
            'fornitori' => $fornitoreService->lista()
        ]);
    }

    public function addFornitore(Request $request, FornitoreService $fornitoreService)
    {
        $fornitoreService->addFornitore($request);
    }
}
