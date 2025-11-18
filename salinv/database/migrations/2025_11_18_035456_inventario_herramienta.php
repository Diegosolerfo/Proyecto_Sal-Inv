<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('inventario_herramientas', function (Blueprint $table) {
        $table->smallIncrements('idHerramienta');
        $table->string('nombre');
        $table->enum('tipoHerramienta', [
            'Herramienta de Mano', 
            'Herramienta de Instalacion', 
            'Herramienta de Taller',
            'Herramienta de Oficina',
            'Maquinaria pesada'
        ]);
        $table->unsignedSmallInteger('cantidad');
        $table->binary('imagenHerramienta')->nullable();
        $table->enum('estado', ['Activo','No activo'])->default('Activo');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
