<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::paginate(10);
        return view('usuarios.usuarioIndex', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuario::paginate(10);
        return view('usuarios.usuarioCrear', compact('usuarios'));
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
            'nombre' => 'required',
            'correoElectronico' => 'required',
            'telefono' => 'required',
            'direccion' => 'required|string',
        ]);
    
        $usuarios = new Usuario();
        $usuarios->nombre = $request->nombre;
        $usuarios->correoElectronico = $request->correoElectronico;
        $usuarios->telefono = $request->telefono;
        $usuarios->direccion = $request->direccion;
        $usuarios->save();
    
        return redirect()->route('usuario.index')
                         ->with('success', 'El usuario ha sido creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = Usuario::findOrFail($id);
        return view('usuarios.usuarioEditar', compact('usuarios'));
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
            'nombre' => 'required',
            'correoElectronico' => 'required',
            'telefono' => 'required',
            'direccion' => 'required|string',
        ]);
    
        $usuarios = Usuario::findOrFail($id);
        $usuarios->nombre = $request->nombre;
        $usuarios->correoElectronico = $request->correoElectronico;
        $usuarios->telefono = $request->telefono;
        $usuarios->direccion = $request->direccion;
        $usuarios->save();
    

        return redirect()->route('usuario.index')
                         ->with('success', 'El usuario ha sido actualizado exitosamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios = Usuario::findOrFail($id);
        $usuarios->delete();

        return redirect()->route('usuario.index')
                         ->with('success', 'El usuario ha sido eliminado exitosamente.');
    }

    public function buscar(Request $request)
{
    $busqueda = $request->input('busqueda');
    $usuarios = Usuario::where('nombre', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('correoElectronico', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('telefono', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('direccion', 'LIKE', '%' . $busqueda . '%')
                        ->paginate(10);
    $usuarios->appends(['busqueda' => $busqueda]);
    return view('usuarios.usuarioIndex', compact('usuarios'));
}
}
