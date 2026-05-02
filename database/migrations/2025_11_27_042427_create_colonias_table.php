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
         Schema::create('colonias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('calle');
            $table->integer('numero_calle');
            
            // ENUM de prioridad
            $table->enum('prioridad', ['muy alta', 'alta', 'baja'])->default('baja');
            $table->enum('estado', ['atendido', 'no atendido'])->default('no atendido');
            // FK hacia rutas
            $table->unsignedBigInteger('id_ruta');
            $table->foreign('id_ruta')->references('id')->on('rutas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colonias');
    }
};
