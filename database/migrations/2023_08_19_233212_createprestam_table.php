<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prestams', function (Blueprint $table) {
            $table->id();
            $table->date('fechaSolicitud');
            $table->date('fechaPrestamo');
            $table->date('fechaDevolucion');
            $table->unsignedBigInteger('libroId');
            $table->unsignedBigInteger('usuarioId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestams');
    }
};
