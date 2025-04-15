<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntregaEquipo extends Model
{
    protected $fillable = [
        'fecha_entrega',
        'numero_caso',
        'tipo_entrega',
        'tipo_equipo',
        'marca',
        'modelo',
        'serial',
        'activo',
        'nombre_empleado',
        'cedula_empleado',
        'nombre_entrega',
        'cargo_entrega',
        'campana',
        'observaciones',
        'firma_entrega',
        'firma_recibe'
    ];

    protected $casts = [
        'fecha_entrega' => 'date',
    ];
}