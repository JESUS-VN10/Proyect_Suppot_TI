<?php

namespace App\Http\Controllers;

use App\Models\CampanasActas as ModelsCampanasActas;
use Illuminate\Http\Request;

class CampanasActas extends Controller
{

    // Agregar campañas
    public function AgregarCam(Request $request){
        $cam = ModelsCampanasActas::where('nombre_camp',$request->input('nombre_cam'))->exists();
        if($cam){
            return true;
        }

        $camp = new ModelsCampanasActas();
        $camp->nombre_camp = $request->input('nombre_cam');
        $camp->camp_activo = true;
        $camp->save();
        return false;
    }
    // Modificar
    public function ModificarCam($id, Request $request){
        $cam = ModelsCampanasActas::find($id);
        $cam->nombre_camp = $request->input('nombre_camp');
        $cam->save();
    }
    // Inhabilitar la campaña
    public function EliminarCam($id){
        $cam = ModelsCampanasActas::find($id);
        $cam->camp_activo = false;
        $cam->save();
    }
    // Habilitar la campaña
    public function HabilitarCam($id){
        $cam = ModelsCampanasActas::find($id);
        $cam->camp_activo = true;
        $cam->save();
        return true;
    }

    // Mostrar a todas las campañas de la base de datos que solo esten activos
    public function MostrarCam(){
        $camps = ModelsCampanasActas::orderBy('nombre_camp','ASC')->where('camp_activo',true)->get();
        // Devolver la respuesta en formato JSON
        return response()->json($camps);
    }
    // Mostrar a todas las campañas de la base de datos
    public function MostrarCamAll(){
        $camps = ModelsCampanasActas::orderBy('nombre_camp','ASC')->get();
        // Devolver la respuesta en formato JSON
        return response()->json($camps);
    }

    // Buscar campaña
    public function BuscarCamp(Request $request){
        $cam = ModelsCampanasActas::where('id',$request->input('id'))->first();
        return response()->json($cam);
    }

}
