<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PrestamoController;

Route::get('/', function () {
    return view('principal');
})->name('principal');

/*Rutas Libros */
Route::get('/indexLibro', [LibroController::class, 'index'])->name('libro.index');
Route::get('/crearLibros', [LibroController::class, 'create'])->name('libros.create');
Route::post('/indexLibro', [LibroController::class, 'store'])->name('libros.store');
Route::get('/indexLibro/{libro}/edit', [LibroController::class, 'edit'])->name('libros.edit');
Route::put('/indexLibro/{libro}', [LibroController::class, 'update'])->name('libros.update');
Route::delete('/indexLibro/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');
Route::get('/buscar', [LibroController::class, 'buscar'])->name('libros.buscar');

/*Rutas Usuarios */
Route::get('/usuarioIndex', [UsuarioController::class, 'index'])->name('usuario.index');
Route::get('/usuarioCrear', [UsuarioController::class, 'create'])->name('usuario.create');
Route::post('/usuarioIndex', [UsuarioController::class, 'store'])->name('usuario.store');
Route::get('/usuarioIndex/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuario.edit');
Route::put('/usuarioIndex/{usuario}', [UsuarioController::class, 'update'])->name('usuario.update');
Route::delete('/usuarioIndex/{usuario}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
Route::get('/buscarUsuario', [UsuarioController::class, 'buscar'])->name('usuarios.buscar');


/*Rutas Prestamos */
Route::get('/indexPrestamo', [PrestamoController::class, 'index'])->name('prestamo.index');
Route::get('/crearPrestamo', [PrestamoController::class, 'create'])->name('prestamo.create');
Route::post('/prestamos', [PrestamoController::class, 'store'])->name('prestamos.store');
Route::get('/indexPrestamo/{prestamo}/edit', [PrestamoController::class, 'edit'])->name('prestamo.edit');
Route::put('/indexPrestamo/{prestamo}', [PrestamoController::class, 'update'])->name('prestamos.update');
Route::delete('/indexPrestamo/{prestamo}', [PrestamoController::class, 'destroy'])->name('prestamo.destroy');
Route::get('/buscarPrestamo', [PrestamoController::class, 'buscar'])->name('prestamo.buscar');
