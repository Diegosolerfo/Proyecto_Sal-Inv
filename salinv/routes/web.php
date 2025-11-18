<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DetallesCreaController;
use App\Http\Controllers\DetallesUtilizaController;
use App\Http\Controllers\EspecificacionesPedidoController;
use App\Http\Controllers\InventarioHerramientaController;
use App\Http\Controllers\InventarioMaterialController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;

Route::get('/', function () {
    return view('layouts.app');
});

// Categorias
Route::resource('categorias', CategoriaController::class);

// Colores
Route::resource('colores', ColorController::class);

// Detalles Crea
Route::resource('detalles-crea', DetallesCreaController::class);

// Detalles Utiliza
Route::resource('detalles-utiliza', DetallesUtilizaController::class);

// Especificaciones Pedido
Route::resource('especificaciones-pedido', EspecificacionesPedidoController::class);

// Inventario Herramienta
Route::resource('inventario-herramienta', InventarioHerramientaController::class);

// Inventario Material
Route::resource('inventario-material', InventarioMaterialController::class);

// Materiales
Route::resource('materiales', MaterialController::class);

// Pedidos
Route::resource('pedidos', PedidoController::class);

// Proyectos
Route::resource('proyectos', ProyectoController::class);

// Usuarios
Route::resource('usuarios', UsuarioController::class);

// Ventas
Route::resource('ventas', VentaController::class);
