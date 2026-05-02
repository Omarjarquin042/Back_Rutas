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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();

            // Descripción del reporte
            $table->text('descripcion');

            // Fecha en que se creó el reporte
            $table->timestamp('fecha_reporte')->nullable();

            // FK hacia colonias
            $table->unsignedBigInteger('id_colonia');
            $table->foreign('id_colonia')
                  ->references('id')
                  ->on('colonias')
                  ->onDelete('cascade');

            // FK hacia usuarios (choferes)
            $table->unsignedBigInteger('id_chofer');
            $table->foreign('id_chofer')
                  ->references('id')
                  ->on('users')  // chofer es un rol dentro de users
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
