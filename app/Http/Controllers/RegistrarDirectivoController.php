<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrarDirectivoController extends Controller
{
    // Método para registrar un nuevo directivo
    public function registrar(Request $request)
    {
        // Validar los datos del request
        $validated = $request->validate([
            'cedula' => 'required|unique:directivos_campanas,cedula',
            'nombre' => 'required',
            'correo' => 'required|email|unique:directivos_campanas,correo',
        ]);

        try {
            // Insertar los datos en la tabla 'directivos_campanas'
            DB::table('directivos_campanas')->insert([
                'cedula' => $request->cedula,
                'nombre_director' => $request->nombre,
                'correo' => $request->correo,
                'usuario_activo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al registrar'], 500);
        }
    }

    // Método para obtener todos los directivos registrados
    public function mostrarDirectivos()
    {
        try {
            // Obtener todos los directivos activos (o todos, dependiendo de tu lógica)
            $directivos = DB::table('directivos_campanas')
                ->select('id', 'nombre_director as nombre', 'correo') // Aseguramos que se devuelvan los campos correctos
                ->get();

            return response()->json($directivos); // Devuelve la lista de directivos en formato JSON
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al obtener los directivos'], 500);
        }
    }
}

