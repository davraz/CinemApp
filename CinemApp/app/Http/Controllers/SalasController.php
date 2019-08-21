<?php

namespace App\Http\Controllers;

use App\Sala;
use App\Silla;
use Illuminate\Http\Request;

class SalasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = Sala::all();

        return view('salas', ['salas' => $salas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crearSala');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'numero' => 'required|integer',
            'columnas' => 'required|integer|min:5|max:15',
            'filas' => 'required|integer|min:5|max:20'
        ]);

        $sala = new Sala;
        $sala->id = $validData['numero'];
        $sala->numero = $validData['numero'];
        $sala->columnas = $validData['columnas'];
        $sala->filas = $validData['filas'];

        $sala->save();

        $sala->asignarSillas();

        return redirect(route('salas.index'))
            ->with('mensaje', 'Sala creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sala = Sala::findOrFail($id);

        return view('editarSala', [
            'sala' => $sala
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sala = Sala::findOrFail($id);

        $validData = $request->validate([
            'numero' => 'required|integer',
            'columnas' => 'required|integer|min:5|max:15',
            'filas' => 'required|integer|min:5|max:20'
        ]);

        $sala->numero = $validData['numero'];
        $sala->columnas = $validData['columnas'];
        $sala->filas = $validData['filas'];

        $sala->save();

        $sala->asignarSillas();

        return redirect(route('salas.index'))
            ->with('mensaje', 'Sala actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sala = Sala::findOrFail($id);

        $sala->delete();

        return redirect(route('salas.index'))
            ->with('mensaje', 'Sala eliminada correctamente');
    }
}
