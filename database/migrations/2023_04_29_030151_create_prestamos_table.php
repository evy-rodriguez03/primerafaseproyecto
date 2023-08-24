<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->date('fechaSolicitud');
            $table->date('fechaPrestamo');
            $table->date('fechaDevolucion');
            $table->unsignedBigInteger('libroId');
            $table->unsignedBigInteger('usuarioId');
            $table->foreign('libroId')->references('id')->on('libros');
            $table->foreign('usuarioId')->references('id')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
