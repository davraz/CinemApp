<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;

class PeliculasController extends Controller
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
        $peliculas = Pelicula::all();

        return view('peliculas', [
            'peliculas' => $peliculas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crearPelicula');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'titulo' => 'required|max:255',
            'genero' => 'required|',
            'director' => 'required',
            'duracion' => 'required',
            'censura' => 'required',
            'portada' => 'required|url'
        ]);

        $pelicula = new Pelicula();
        $pelicula->titulo = $validData['titulo'];
        $pelicula->genero = $validData['genero'];
        $pelicula->director = $validData['director'];
        $pelicula->duracion = $validData['duracion'];
        $pelicula->censura = $validData['censura'];
        $pelicula->portada = $validData['portada'];

        $pelicula->save();

        return redirect(route('peliculas.index'))
            ->with('mensaje', 'Película creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelicula = Pelicula::findOrFail($id);

        return view('editarPelicula', [
            'pelicula' => $pelicula
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelicula = Pelicula::findOrFail($id);

        $validData = $request->validate([
            'titulo' => 'required|max:255',
            'genero' => 'required|',
            'director' => 'required',
            'duracion' => 'required',
            'censura' => 'required',
            'portada' => 'required|url'
        ]);

        $pelicula->titulo = $validData['titulo'];
        $pelicula->genero = $validData['genero'];
        $pelicula->director = $validData['director'];
        $pelicula->duracion = $validData['duracion'];
        $pelicula->censura = $validData['censura'];
        $pelicula->portada = $validData['portada'];

        $pelicula->save();

        return redirect(route('peliculas.index'))
            ->with('mensaje', 'Película actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::findOrFail($id);

        $pelicula->delete();

        return redirect(route('peliculas.index'))
            ->with('mensaje', 'Película eliminada correctamente');
    }
}
