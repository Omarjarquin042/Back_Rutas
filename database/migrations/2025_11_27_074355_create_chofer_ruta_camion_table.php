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
        Schema::create('chofer_ruta_camion', function (Blueprint $table) {
            $table->id();

            // Chofer (User)
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            // Ruta
            $table->unsignedBigInteger('id_ruta');
            $table->foreign('id_ruta')
                  ->references('id')->on('rutas')
                  ->onDelete('cascade');

            // Camión
            $table->unsignedBigInteger('id_camion');
            $table->foreign('id_camion')
                  ->references('id')->on('camion')
                  ->onDelete('cascade');

            // Fecha de asignación
            $table->date('fecha')->nullable();

            // Estado de la asignación
            $table->enum('estado', ['asignado', 'completado'])
                  ->default('asignado');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chofer_ruta_camion');
    }
};
