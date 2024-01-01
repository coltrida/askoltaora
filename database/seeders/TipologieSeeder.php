<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipologieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::insert([
            [
                'nome' => 'LEAD',
                'descrizione' => 'appuntamento, ancora non visto',
                'giorniToRecall' => null
            ],
            [
                'nome' => 'CL',
                'descrizione' => 'acquistato apparecchi',
                'giorniToRecall' => null
            ],
            [
                'nome' => 'PC',
                'descrizione' => 'appuntamento effettuato, ipoacusia',
                'giorniToRecall' => 90
            ],
            [
                'nome' => 'CLC',
                'descrizione' => 'cliente concorrenza',
                'giorniToRecall' => 300
            ],
            [
                'nome' => 'PREM',
                'descrizione' => 'appuntamento effettuato, lieve ipoacusia',
                'giorniToRecall' => 400
            ],
            [
                'nome' => 'DEC',
                'descrizione' => 'deceduto',
                'giorniToRecall' => null
            ],
            [
                'nome' => 'TAPPO',
                'descrizione' => 'tappo di cerume',
                'giorniToRecall' => null
            ],
            [
                'nome' => 'NORMO',
                'descrizione' => 'appuntamento effettuato, normoudente',
                'giorniToRecall' => null
            ],
        ]);
    }
}
