<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proyecto
 *
 * @property $idProyecto
 * @property $precio
 * @property $nombre
 * @property $descripcion
 * @property $estado
 * @property $imagen
 * @property $codigoUsuario
 * @property $codigoPedido
 * @property $created_at
 * @property $updated_at
 *
 * @property Pedido $pedido
 * @property Usuario $usuario
 * @property DetallesCrea[] $detallesCreas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proyecto extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['idProyecto', 'precio', 'nombre', 'descripcion', 'estado', 'imagen', 'codigoUsuario', 'codigoPedido'];


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
    public function detallesCreas()
    {
        return $this->hasMany(\App\Models\DetallesCrea::class, 'idProyecto', 'codigoProyecto');
    }
    
}
