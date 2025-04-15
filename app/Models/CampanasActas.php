<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampanasActas extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nombre_camp'
    ];
    //  Camps = Campañas
    protected $table = 'camps';
}
