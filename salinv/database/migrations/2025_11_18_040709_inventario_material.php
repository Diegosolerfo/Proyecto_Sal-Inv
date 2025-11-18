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
    Schema::create('inventario_material', function (Blueprint $table) {
        $table->smallIncrements('idMaterial');
        $table->string('nombre');
        $table->string('descripcion');
        $table->unsignedSmallInteger('cantidad');
        $table->date('fechaCompra');
        $table->unsignedMediumInteger('valorUnidad');
        $table->unsignedInteger('valorTotal');
        $table->binary('imagenMaterial')->nullable();
        $table->date('fechaRegistro');
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
