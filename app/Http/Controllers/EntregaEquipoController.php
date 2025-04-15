<?php

namespace App\Http\Controllers;

use App\Models\EntregaEquipo;
use Illuminate\Http\Request;

class EntregaEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entregas = EntregaEquipo::all();
        return view('entrega_equipos.index', compact('entregas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entrega_equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha_entrega' => 'required|date',
            'numero_caso' => 'required|string',
            'tipo_entrega' => 'required|string',
            'tipo_equipo' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'serial' => 'required|string',
            'activo' => 'required|string',
            'nombre_empleado' => 'required|string',
            'cedula_empleado' => 'required|string',
            'nombre_entrega' => 'required|string',
            'cargo_entrega' => 'required|string',
            'campana' => 'required|string',
            'observaciones' => 'nullable|string',
            'firma_entrega' => 'required|string',
            'firma_recibe' => 'required|string',
        ]);

        EntregaEquipo::create($validatedData);

        return redirect()->route('entrega_equipos.index')->with('success', 'Entrega de equipo creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EntregaEquipo $entregaEquipo)
    {
        return view('entrega_equipos.show', compact('entregaEquipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EntregaEquipo $entregaEquipo)
    {
        return view('entrega_equipos.edit', compact('entregaEquipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EntregaEquipo $entregaEquipo)
    {
        $validatedData = $request->validate([
            'fecha_entrega' => 'required|date',
            'numero_caso' => 'required|string',
            'tipo_entrega' => 'required|string',
            'tipo_equipo' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'serial' => 'required|string',
            'activo' => 'required|string',
            'nombre_empleado' => 'required|string',
            'cedula_empleado' => 'required|string',
            'nombre_entrega' => 'required|string',
            'cargo_entrega' => 'required|string',
            'campana' => 'required|string',
            'observaciones' => 'nullable|string',
            'firma_entrega' => 'required|string',
            'firma_recibe' => 'required|string',
        ]);

        $entregaEquipo->update($validatedData);

        return redirect()->route('entrega_equipos.index')->with('success', 'Entrega de equipo actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EntregaEquipo $entregaEquipo)
    {
        $entregaEquipo->delete();

        return redirect()->route('entrega_equipos.index')->with('success', 'Entrega de equipo eliminada exitosamente.');
    }
}