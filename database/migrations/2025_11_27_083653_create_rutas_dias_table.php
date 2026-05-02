<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rutas_dias', function (Blueprint $table) {
            $table->id();

            // Llave foránea hacia rutas
            $table->unsignedBigInteger('id_ruta');
            $table->foreign('id_ruta')
                  ->references('id')
                  ->on('rutas')
                  ->onDelete('cascade');

            // Día de la semana
            $table->enum('dia_semana', [
                'lunes',
                'martes',
                'miercoles',
                'jueves',
                'viernes',
                'sabado',
                'domingo'
            ]);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rutas_dias');
    }
};
