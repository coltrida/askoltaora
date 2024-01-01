<?php

namespace Database\Seeders;

use App\Models\Canale;
use App\Models\Dottore;
use App\Models\Recapito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CanaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $recapito = Recapito::first();
        $dottore = Dottore::first();

        Canale::insert([
            [
                'primario' => 'SCREENING',
                'secondario' => $recapito->id
            ],
            [
                'primario' => 'TLK FILIALE',
                'secondario' => null
            ],
            [
                'primario' => 'CALL CENTER',
                'secondario' => null
            ],
            [
                'primario' => 'MEDICO',
                'secondario' => $dottore->id
            ],
            [
                'primario' => 'PASSAPAROLA',
                'secondario' => null
            ],
            [
                'primario' => 'SOCIAL',
                'secondario' => null
            ],
            [
                'primario' => 'VETRINA',
                'secondario' => null
            ],
        ]);
    }
}
