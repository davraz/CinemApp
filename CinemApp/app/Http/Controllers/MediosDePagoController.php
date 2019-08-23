<?php

namespace App\Http\Controllers;

use App\MedioDePago;
use App\Usuario;
use Illuminate\Http\Request;

class MediosDePagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario = Usuario::findOrFail($request->user()->id);

        $mediosDePago = $usuario->mediosDePago;

        return view('mediosDePago', [
            'mediosDePago' => $mediosDePago
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agregarMedioDePago');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $añoActual = date("y");
        $user = $request->user();

        $validData = $request->validate([
            'numero' => 'required|integer|digits:16',
            'mes_expiracion' => 'required|numeric|between:1,12',
            'año_expiracion' => 'required|numeric|between:' . $añoActual . ','. ($añoActual + 10),
            'cvv' => 'required|digits:3'
        ]);

        $medioDePago = new MedioDePago;
        $medioDePago->numero = $validData['numero'];
        $medioDePago->expiracion = $validData['mes_expiracion'] . '/' . $validData['año_expiracion'];
        $medioDePago->cvv = $validData['cvv'];
        $medioDePago->usuario_id = $user->id;
        $medioDePago->tipo = 'TarjetaDeCredito';
        $medioDePago->saldo = 1200000;

        $medioDePago->save();

        return redirect(route('mediosDePago.index'))
            ->with('mensaje', 'Medio de pago agregado correctamente');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
