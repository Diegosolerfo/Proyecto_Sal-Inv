<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetallesCrea
 *
 * @property $codigoProyecto
 * @property $codigoMaterial
 * @property $salida
 * @property $fechaSalida
 * @property $totalInventario
 * @property $loTiene
 *
 * @property InventarioMaterial $inventarioMaterial
 * @property Proyecto $proyecto
 * @property Usuario $usuario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetallesCrea extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['codigoProyecto', 'codigoMaterial', 'salida', 'fechaSalida', 'totalInventario', 'loTiene'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventarioMaterial()
    {
        return $this->belongsTo(\App\Models\InventarioMaterial::class, 'codigoMaterial', 'idMaterial');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proyecto()
    {
        return $this->belongsTo(\App\Models\Proyecto::class, 'codigoProyecto', 'idProyecto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class, 'loTiene', 'idUsuario');
    }
    
}
