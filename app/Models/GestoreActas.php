<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestoreActas extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $primaryKey = 'id';

    protected $table = 'gestores';

    protected $fillable = [
        'id',
        'cedula',
        'nombre_gestor',
        'correo',
        'password',
        'rol'
    ];

}
