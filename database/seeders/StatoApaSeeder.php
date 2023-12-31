<?php

namespace Database\Seeders;

use App\Models\Statoapa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatoApaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Statoapa::insert([
            [
                'nome' => 'MAGAZZINO',
                'descrizione' => 'apparecchio in magazzino'
            ],
            [
                'nome' => 'IN PROVA',
                'descrizione' => 'apparecchio in prova al paziente'
            ],
            [
                'nome' => 'SPEDITO',
                'descrizione' => 'apparecchio spedito alla filiale'
            ],
            [
                'nome' => 'RICHIESTO',
                'descrizione' => 'apparecchio richiesto dalla filiale'
            ],
            [
                'nome' => 'PROVA IN CORSO',
                'descrizione' => ''
            ],
            [
                'nome' => 'FATTURATO',
                'descrizione' => 'apparecchio fatturato'
            ],
            [
                'nome' => 'RESO',
                'descrizione' => 'apparecchio reso dal paziente'
            ],
            [
                'nome' => 'IN CARICO',
                'descrizione' => ''
            ],
        ]);
    }
}
