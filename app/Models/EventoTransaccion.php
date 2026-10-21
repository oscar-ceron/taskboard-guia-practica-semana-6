<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventoTransaccion extends Model
{ 
    use HasFactory;
    protected $fillable = [
        'transaccion_id',
        'estado_anterior',
        'estado_nuevo',
    ];

    public function transaccion()
    {
        return $this->belongsTo(Transaccion::class);
    }
}   