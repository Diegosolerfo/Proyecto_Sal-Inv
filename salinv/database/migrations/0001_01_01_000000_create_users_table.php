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
    Schema::create('usuarios', function (Blueprint $table) {
        $table->smallIncrements('idUsuario');
        $table->unsignedBigInteger('numeroDocumento')->unique();
        $table->string('clave');
        $table->string('nombre');
        $table->string('apellido');
        $table->string('correo')->unique();
        $table->date('fechaNacimiento');
        $table->string('direccion');
        $table->enum('genero', ['Hombre','Mujer'])->nullable();
        $table->unsignedInteger('telefono')->unique();
        $table->enum('estadoCuenta', ['Activo','No activo'])->default('Activo');
        $table->enum('rol', ['Cliente','Operador','Administrador'])->default('Cliente');
        $table->string('eps')->nullable();
        $table->enum('rh', ['+','-'])->nullable();
        $table->enum('tipoSangre', ['AB','O','A','B'])->nullable();
        $table->unsignedSmallInteger('registradoPor')->nullable();
        
        $table->foreign('registradoPor')->references('idUsuario')->on('usuarios');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
