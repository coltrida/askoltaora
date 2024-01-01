<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recapito extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'recapitos';

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtoupper($value);
    }

    public function setIndirizzoAttribute($value)
    {
        $this->attributes['indirizzo'] = strtoupper($value);
    }

    public function setCittaAttribute($value)
    {
        $this->attributes['citta'] = strtoupper($value);
    }

    public function setProvinciaAttribute($value)
    {
        $this->attributes['provincia'] = strtoupper($value);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function filiale()
    {
        return $this->belongsTo(Filiale::class);
    }
}
