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
    Schema::create('proyectos', function (Blueprint $table) {
        $table->smallIncrements('idProyecto');
        $table->unsignedInteger('precio');
        $table->string('nombre', 50);
        $table->string('descripcion')->nullable();
        $table->enum('estado', ['Activo','No activo'])->default('Activo');
        $table->binary('imagen');
        $table->unsignedSmallInteger('codigoUsuario');
        $table->unsignedSmallInteger('codigoPedido');

        $table->foreign('codigoUsuario')->references('idUsuario')->on('usuarios');
        $table->foreign('codigoPedido')->references('idPedido')->on('pedidos');

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
