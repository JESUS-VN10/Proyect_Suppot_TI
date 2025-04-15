<?php

namespace App\Http\Controllers;

use App\Models\Componentes;
use Illuminate\Http\Request;

class ComponentesController extends Controller
{
    // Agregar componentes
    public function AgregarComponente(Request $request){
        // Validacion de si existe el componente
        if(Componentes::where('nombre_componente',$request->input('nombre_componente'))->exists()){
            return true;
        }

        $componente = new Componentes();
        $componente->nombre_componente = $request->input('nombre_componente');
        $componente->save();
        return false;
    }

    // Buscar componente
    public function BuscarComponente($id){
        return response()->json(Componentes::find($id));
    }

    // Borrar componentes
    public function BorrarComponente($id){
        Componentes::find($id)->delete();
        return true;
    }
    
    // Modificar
    public function ModificarComponente($id, Request $request){
        $componente = Componentes::find($id);
        // Validar que no exista el mismo nombre
        if(Componentes::where('nombre_componente',$request->input('nombre_componente'))->exists()){
            return false;
        }
        $componente->nombre_componente = $request->input('nombre_componente');
        $componente->save();
        return true;
    }

    // Mostrar 
    public function MostrarComponente(){
        return response()->json(Componentes::orderBy('nombre_componente','ASC')->get());
    }


}
