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
        Schema::create('proyectos', function (Blueprint $table) {
            //Se agregan nuevos campos a la tabla proyectos
            $table->id();
            $table->string('nombre', 120);
            $table->date('fecha_inicio');
            $table->string('estado', 25);
            $table->string('responsable', 120);
            $table->decimal('monto', 12,2);// se asegura que el monto tenga como máximo 10 dígitos enteros con dos decimales
            $table->foreignId('created_by')->constrained('users');//Se relaciona el ID del usuario con el usuario creador.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
