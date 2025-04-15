<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial_pdf extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $primaryKey = 'id';

    protected $fillable = [
        'id',
        'tipo_acta',
        'ruta_pdf',
        'fk_id_gestor',
        'fk_id_camp',
        'fecha_creacion',
        'numero_caso'
    ];

    protected $table = 'historial_actas';

    // Acceder a los atributos del gestor
    public function getGestor(){
        return $this->belongsTo(GestoreActas::class, 'id');
    }

    // Acceder a los atributos de la camapaña
    public function getCamp(){
        return $this->belongsTo(CampanasActas::class, 'id');
    }
}
