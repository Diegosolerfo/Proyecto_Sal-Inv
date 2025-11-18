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
    Schema::create('detalles_utiliza', function (Blueprint $table) {
        $table->unsignedSmallInteger('codigoUsuario');
        $table->unsignedSmallInteger('codigoHerramienta');
        $table->unsignedSmallInteger('salida');
        $table->date('fechaSalida');
        $table->date('fechaLlegada')->nullable();

        $table->foreign('codigoUsuario')->references('idUsuario')->on('usuarios');
        $table->foreign('codigoHerramienta')->references('idHerramienta')->on('inventario_herramientas');
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
