<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 *
 * @property $idPedido
 * @property $codigoCategoria
 * @property $descripcion
 * @property $abono
 * @property $fechaSolicitud
 * @property $fechaEntrega
 * @property $fechaVisita
 * @property $estado
 * @property $codigoColor
 * @property $codigoMaterial
 * @property $codigoUsuario
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Colore $colore
 * @property Materiale $materiale
 * @property Usuario $usuario
 * @property EspecificacionesPedido[] $especificacionesPedidos
 * @property Proyecto[] $proyectos
 * @property Venta $venta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pedido extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['idPedido', 'codigoCategoria', 'descripcion', 'abono', 'fechaSolicitud', 'fechaEntrega', 'fechaVisita', 'estado', 'codigoColor', 'codigoMaterial', 'codigoUsuario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class, 'codigoCategoria', 'idCategoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colore()
    {
        return $this->belongsTo(\App\Models\Colore::class, 'codigoColor', 'idColor');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materiale()
    {
        return $this->belongsTo(\App\Models\Materiale::class, 'codigoMaterial', 'idMaterial');
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
    public function especificacionesPedidos()
    {
        return $this->hasMany(\App\Models\EspecificacionesPedido::class, 'idPedido', 'codigoPedido');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectos()
    {
        return $this->hasMany(\App\Models\Proyecto::class, 'idPedido', 'codigoPedido');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function venta()
    {
        return $this->hasOne(\App\Models\Venta::class, 'idPedido', 'codigoPedido');
    }
    
}
