<?php

namespace Database\Seeders;

use App\Models\Dottore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DottoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dottore::insert([
            [
                'filiale_id' => rand(1,3),
                'nome' => 'Rossi Mario',
                'citta' => 'Roma'
            ],
            [
                'filiale_id' => rand(1,3),
                'nome' => 'Vardi Luigi',
                'citta' => 'Fabriano'
            ],
            [
                'filiale_id' => rand(1,3),
                'nome' => 'Bianchi Gino',
                'citta' => 'Cassino'
            ],
        ]);
    }
}
