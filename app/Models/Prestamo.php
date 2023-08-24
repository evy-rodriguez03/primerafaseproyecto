<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    public function libro() {
        return $this->belongsTo('App\Models\Libro', 'libroId');
    }

    public function usuario() {
        return $this->belongsTo('App\Models\Usuario', 'usuarioId');
    }

    protected $fillable = [
        'fechaSolicitud',
        'fechaPrestamo',
        'fechaDevolucion',
        'libroId',
        'usuarioId',
    ];
    use HasFactory;
}


