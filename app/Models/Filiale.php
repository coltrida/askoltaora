<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiale extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'filiales';

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

    public function clienti()
    {
        return $this->hasMany(Client::class, 'filiale_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'filiale_user', 'filiale_id', 'user_id')
            ->withPivot(['id']);
    }

    public function prodotti()
    {
        return $this->hasMany(Prodotto::class);
    }

    public function recapiti()
    {
        return $this->hasMany(Recapito::class);
    }
}
