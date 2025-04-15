<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componentes extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nombre_componente'
    ];

    protected $table = 'componentes';


}
