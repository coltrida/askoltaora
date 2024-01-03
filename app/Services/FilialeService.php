<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Filiale;

class FilialeService
{
    public function addFiliale(Request $request)
    {
        Filiale::create($request->all());
    }

    public function filialeById($idFiliale)
    {
        return Filiale::find($idFiliale);
    }

    public function filialiConTipologiePazienti()
    {
        /*dd(Filiale::
        withCount(['clienti as LEAD' => function($q){
            $q->whereHas('tipo', function ($z){
                $z->where('nome', 'LEAD');
            });
        }])
            ->withCount(['clienti as CL' => function($q){
                $q->whereHas('tipo', function ($z){
                    $z->where('nome', 'CL');
                });
            }])
            ->withCount(['clienti as PC' => function($q){
                $q->whereHas('tipo', function ($z){
                    $z->where('nome', 'PC');
                });
            }])
            ->withCount(['clienti as CLC' => function($q){
                $q->whereHas('tipo', function ($z){
                    $z->where('nome', 'CLC');
                });
            }])
            ->withCount(['clienti as PREM' => function($q){
                $q->whereHas('tipo', function ($z){
                    $z->where('nome', 'PREM');
                });
            }])
            ->withCount(['clienti as DEC' => function($q){
                $q->whereHas('tipo', function ($z){
                    $z->where('nome', 'DEC');
                });
            }])
            ->withCount(['clienti as TAPPO' => function($q){
                $q->whereHas('tipo', function ($z){
                    $z->where('nome', 'TAPPO');
                });
            }])
            ->withCount(['clienti as NORMO' => function($q){
                $q->whereHas('tipo', function ($z){
                    $z->where('nome', 'NORMO');
                });
            }])
            ->withCount('clienti as tot')
            ->orderBy('nome')
            ->get());*/

        return Filiale::
        withCount(['clienti as LEAD' => function($q){
            $q->whereHas('tipo', function ($z){
                $z->where('nome', 'LEAD');
            });
        }])
            ->withCount(['clienti as CL' => function($q){
                $q->whereHas('tipo', function ($z){
                    $z->where('nome', 'CL');
                });
            }])
            ->withCount(['clienti as PC' => function($q){
                $q->whereHas('tipo', function ($z){
                    $z->where('nome', 'PC');
                });
            }])
            ->withCount(['clienti as CLC' => function($q){
                $q->whereHas('tipo', function ($z){
                    $z->where('nome', 'CLC');
                });
            }])
            ->withCount(['clienti as PREM' => function($q){
                $q->whereHas('tipo', function ($z){
                    $z->where('nome', 'PREM');
                });
            }])
            ->withCount(['clienti as DEC' => function($q){
                $q->whereHas('tipo', function ($z){
                    $z->where('nome', 'DEC');
                });
            }])
            ->withCount(['clienti as TAPPO' => function($q){
                $q->whereHas('tipo', function ($z){
                    $z->where('nome', 'TAPPO');
                });
            }])
            ->withCount(['clienti as NORMO' => function($q){
                $q->whereHas('tipo', function ($z){
                    $z->where('nome', 'NORMO');
                });
            }])
            ->withCount('clienti as tot')
            ->orderBy('nome')
            ->get();
    }
}
