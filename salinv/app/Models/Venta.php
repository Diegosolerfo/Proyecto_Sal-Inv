<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 *
 * @property $idVenta
 * @property $precio
 * @property $descuento
 * @property $fechaFacturacion
 * @property $impuesto
 * @property $cancelacion
 * @property $codigoUsuario
 * @property $codigoPedido
 * @property $created_at
 * @property $updated_at
 *
 * @property Pedido $pedido
 * @property Usuario $usuario
 * @property Deuda[] $deudas
 * @property Ventasdetalle[] $ventasdetalles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['idVenta', 'precio', 'descuento', 'fechaFacturacion', 'impuesto', 'cancelacion', 'codigoUsuario', 'codigoPedido'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pedido()
    {
        return $this->belongsTo(\App\Models\Pedido::class, 'codigoPedido', 'idPedido');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class, 'codigoUsuario', 'idUsuario');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deudas()
    {
        return $this->hasMany(\App\Models\Deuda::class, 'id', 'id_venta');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventasdetalles()
    {
        return $this->hasMany(\App\Models\Ventasdetalle::class, 'id', 'venta_id');
    }
    
}
