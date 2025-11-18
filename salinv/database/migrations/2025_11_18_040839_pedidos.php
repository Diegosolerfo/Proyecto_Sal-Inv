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
    Schema::create('pedidos', function (Blueprint $table) {
        $table->smallIncrements('idPedido');
        $table->unsignedSmallInteger('codigoCategoria');
        $table->string('descripcion')->nullable();
        $table->unsignedInteger('abono')->nullable();
        $table->date('fechaSolicitud');
        $table->date('fechaEntrega')->nullable();
        $table->date('fechaVisita');
        $table->enum('estado', ['Activo','No activo'])->default('Activo');
        $table->unsignedSmallInteger('codigoColor');
        $table->unsignedSmallInteger('codigoMaterial');
        $table->unsignedSmallInteger('codigoUsuario');

        $table->foreign('codigoUsuario')->references('idUsuario')->on('usuarios');
        $table->foreign('codigoCategoria')->references('idCategoria')->on('categorias');
        $table->foreign('codigoColor')->references('idColor')->on('colores');
        $table->foreign('codigoMaterial')->references('idMaterial')->on('materiales');

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
