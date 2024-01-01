<?php

namespace App\Http\Controllers;

use App\Services\CanaleService;
use App\Services\CategoriaService;
use App\Services\FilialeService;
use App\Services\FornitoreService;
use App\Services\RecapitoService;
use App\Services\RuoloService;
use App\Services\StatoApaService;
use App\Services\TipologiaService;
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

    public function statoApa(StatoApaService $statoApaService)
    {
        return Inertia::render('Admin/StatoApa', [
            'statoApa' => $statoApaService->lista()
        ]);
    }

    public function addStatoApa(Request $request, StatoApaService $statoApaService)
    {
        $statoApaService->addStatoApa($request);
    }

    public function categorie(CategoriaService $categoriaService)
    {
        return Inertia::render('Admin/Categorie', [
            'categorie' => $categoriaService->lista()
        ]);
    }

    public function addCategoria(Request $request, CategoriaService $categoriaService)
    {
        $categoriaService->addCategoria($request);
    }

    public function tipologie(TipologiaService $tipologiaService)
    {
        return Inertia::render('Admin/Tipologie', [
            'tipologie' => $tipologiaService->lista()
        ]);
    }

    public function addTipologia(Request $request, TipologiaService $tipologiaService)
    {
        $tipologiaService->addTipologia($request);
    }

    public function canali(CanaleService $canaleService)
    {
        return Inertia::render('Admin/Canali', [
            'canali' => $canaleService->lista()
        ]);
    }

    public function addCanale(Request $request, CanaleService $canaleService)
    {
        $canaleService->addCanale($request);
    }

    public function filiali()
    {
        return Inertia::render('Admin/Filiali');
    }

    public function addFiliali(Request $request, FilialeService $filialeService)
    {
        $filialeService->addFiliale($request);
    }

    public function recapiti(RecapitoService $recapitoService)
    {
        return Inertia::render('Admin/Recapiti', [
            'recapiti' => $recapitoService->listaPaginate(),
            'filters' => \Illuminate\Support\Facades\Request::only('search')
        ]);
    }

    public function addRecapito(Request $request, RecapitoService $recapitoService)
    {
        $recapitoService->addRecapito($request);
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
