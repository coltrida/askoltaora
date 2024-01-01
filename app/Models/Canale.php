<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canale extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'canalis';

    public function setPrimarioAttribute($value)
    {
        $this->attributes['primario'] = strtoupper($value);
    }

    public function getSecondarioAttribute($id)
    {
        if ($this->primario === 'SCREENING'){
            $recapito = Recapito::find($id);
            return $recapito->nome.' - '.$recapito->citta;
        } elseif ($this->primario === 'MEDICO'){
            $medico = Dottore::find($id);
            return $medico->nome.' - '.$medico->citta;
        }
    }
}
