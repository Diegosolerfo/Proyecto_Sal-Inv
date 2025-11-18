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
    Schema::create('especificaciones_pedido', function (Blueprint $table) {
        $table->smallIncrements('idEspecificacion');
        $table->string('nombre', 50);
        $table->string('descripcion');
        $table->unsignedSmallInteger('codigoPedido');

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
