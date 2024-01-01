<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtoupper($value);
    }

    public function setCognomeAttribute($value)
    {
        $this->attributes['cognome'] = strtoupper($value);
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

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtoupper($value);
    }

    public function getDataNascitaFormattataAttribute()
    {
        return $this->dataNascita ? Carbon::make($this->dataNascita)->format('d-m-Y') : null;
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id', 'id');
    }

    public function canale()
    {
        return $this->belongsTo(Canale::class, 'canale_id', 'id');
    }

    public function filiale()
    {
        return $this->belongsTo(Filiale::class, 'filiale_id', 'id');
    }

    public function recapito()
    {
        return $this->belongsTo(Recapito::class, 'recapito_id', 'id');
    }

    public function prove()
    {
        return $this->hasMany(Prova::class);
    }

    public function prodotti()
    {
        return $this->hasMany(Prodotto::class);
    }

    public function telefonate()
    {
        return $this->hasMany(Telefonata::class);
    }

    public function appuntamenti()
    {
        return $this->hasMany(Appuntamento::class);
    }

    public function audiometrie()
    {
        return $this->hasMany(Audiometria::class);
    }

    public function informazioni()
    {
        return $this->hasMany(Informazione::class);
    }
}
