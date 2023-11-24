<?php

namespace App\Http\Controllers;

use App\Models\Manzanas;
use Illuminate\Http\Request;

class ManzanasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manzanas = Manzanas::select('id', 'tipoManzana', 'precioKilo')->get();

        return view('verManzanas')->with(compact('manzanas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('insertar-manzana');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Manzanas::create([
            'tipoManzana' => $request->input('tipoManzana'),
            'precioKilo' => $request->input('precioKilo'),
        ]);


        return redirect()->route('insertar-manzana')->with('success', 'Manzana insertada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Manzanas $manzanas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $manzana = Manzanas::find($id);

        if (!$manzana) {
            return redirect()->route('index')->with('error', 'Manzana no encontrada.');
        }

        return view('editar-manzana', compact('manzana'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $manzana = Manzanas::find($id);

        if (!$manzana) {
            return redirect()->route('verManzanas')->with('error', 'Manzana no encontrada.');
        }

        $manzana->update([
            'tipoManzana' => $request->input('tipoManzana'),
            'precioKilo' => $request->input('precioKilo'),
        ]);

        return redirect()->route('verManzanas')->with('success', 'Manzana actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $manzana = Manzanas::find($id);

        if (!$manzana) {
            return redirect()->route('verManzanas')->with('error', 'Manzana no encontrada.');
        }

        $manzana->delete();

        return redirect()->route('verManzanas')->with('success', 'Manzana eliminada correctamente.');
    }
}
