<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dottore extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'dottores';

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtoupper($value);
    }

    public function setCittaAttribute($value)
    {
        $this->attributes['citta'] = strtoupper($value);
    }

    public function filiale()
    {
        return $this->belongsTo(Filiale::class);
    }
}
