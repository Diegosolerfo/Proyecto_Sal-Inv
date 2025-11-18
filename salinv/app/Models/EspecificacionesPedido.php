<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EspecificacionesPedido
 *
 * @property $idEspecificacion
 * @property $nombre
 * @property $descripcion
 * @property $codigoPedido
 * @property $created_at
 * @property $updated_at
 *
 * @property Pedido $pedido
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EspecificacionesPedido extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['idEspecificacion', 'nombre', 'descripcion', 'codigoPedido'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pedido()
    {
        return $this->belongsTo(\App\Models\Pedido::class, 'codigoPedido', 'idPedido');
    }
    
}
