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
    Schema::create('detalles_crea', function (Blueprint $table) {
        $table->unsignedSmallInteger('codigoProyecto');
        $table->unsignedSmallInteger('codigoMaterial');
        $table->unsignedSmallInteger('salida');
        $table->date('fechaSalida');
        $table->unsignedMediumInteger('totalInventario');
        $table->unsignedSmallInteger('loTiene');

        $table->foreign('codigoProyecto')->references('idProyecto')->on('proyectos');
        $table->foreign('codigoMaterial')->references('idMaterial')->on('inventario_material');
        $table->foreign('loTiene')->references('idUsuario')->on('usuarios');
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
