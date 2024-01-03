<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listino extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'listinos';

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtoupper($value);
    }

    public function getPrezzoFormattatoAttribute()
    {
        return $this->prezzolistino ? '€ '.number_format( (float) $this->prezzolistino, '0', ',', '.') : null;
    }

    public function getCostoFormattatoAttribute()
    {
        return $this->costo ? '€ '.number_format( (float) $this->costo, '0', ',', '.') : null;
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function fornitore()
    {
        return $this->belongsTo(Fornitore::class);
    }
}
