<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevolucionEquipo extends Model
{
    protected $fillable = [
        'nombre', 'proyecto_id', 'diadema', 'camara', 'raton', 'teclado',
        'pantallas', 'dispositivo_tipo', 'correo_personal', 'correo_jefe'
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}