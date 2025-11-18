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
    Schema::create('ventas', function (Blueprint $table) {
        $table->smallIncrements('idVenta');
        $table->unsignedInteger('precio');
        $table->unsignedTinyInteger('descuento')->nullable();
        $table->date('fechaFacturacion');
        $table->integer('impuesto');
        $table->enum('cancelacion', ['Si','No'])->default('No');
        $table->unsignedSmallInteger('codigoUsuario');
        $table->unsignedSmallInteger('codigoPedido')->unique();

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
