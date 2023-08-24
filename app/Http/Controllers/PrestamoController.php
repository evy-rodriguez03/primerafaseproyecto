<?php

namespace App\Http\Controllers;
use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\Usuario;

use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos = Prestamo::paginate(10);
        return view('prestamos.indexPrestamo', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prestamos = new Prestamo();
        $libros = Libro::all();
        $usuarios = Usuario::all();

        return view('prestamos.crearPrestamo', compact('libros', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fechaSolicitud' => 'required',
            'fechaPrestamo' => 'required',
            'fechaDevolucion' => 'required',
            'libroId' => 'required|integer',
            'usuarioId' => 'required|integer',
        ]);
        
        $prestamo = new Prestamo;
        $prestamo->fechaSolicitud = $request->input('fechaSolicitud');
        $prestamo->fechaPrestamo = $request->input('fechaPrestamo');
        $prestamo->fechaDevolucion = $request->input('fechaDevolucion');
        $prestamo->libroId = $request->input('libroId');
        $prestamo->usuarioId = $request->input('usuarioId');
    
        $prestamo->save();
    
        return redirect('indexPrestamo')->with('success', 'Prestamo creado correctamente.');
 
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
        $prestamo = Prestamo::find($id);
        $libros = Libro::all();
        $usuarios = Usuario::all();
    
        return view('prestamos.editarPrestamo', compact('prestamo', 'libros', 'usuarios'));
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
        $validatedData = $request->validate([
            'fechaSolicitud' => 'required',
            'fechaPrestamo' => 'required',
            'fechaDevolucion' => 'required',
            'libroId' => 'required|integer',
            'usuarioId' => 'required|integer',
        ]);
        
        $prestamo = Prestamo::find($id);
        $prestamo->fechaSolicitud = $request->input('fechaSolicitud');
        $prestamo->fechaPrestamo = $request->input('fechaPrestamo');
        $prestamo->fechaDevolucion = $request->input('fechaDevolucion');
        $prestamo->libroId = $request->input('libroId');
        $prestamo->usuarioId = $request->input('usuarioId');
    
        $prestamo->save();
    
        return redirect('indexPrestamo')->with('success', 'Prestamo actualizar correctamente.');
 
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();

        return redirect()->route('prestamo.index')
                         ->with('success', 'El prestamo ha sido eliminado exitosamente.');
    }
    public function buscar(Request $request)
    {
        $busqueda = $request->input('buscar');
        $prestamos = Prestamo::where('id', 'LIKE', '%' . $busqueda . '%')
                            ->orWhere('fechaSolicitud', 'LIKE', '%' . $busqueda . '%')
                            ->orWhere('fechaPrestamo', 'LIKE', '%' . $busqueda . '%')
                            ->orWhere('fechaDevolucion', 'LIKE', '%' . $busqueda . '%')
                            ->paginate(10);
        $prestamos->appends(['busqueda' => $busqueda]);
        return view('prestamos.indexPrestamo', compact('prestamos'));
  }
}
