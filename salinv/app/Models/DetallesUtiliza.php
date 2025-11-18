<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetallesUtiliza
 *
 * @property $codigoUsuario
 * @property $codigoHerramienta
 * @property $salida
 * @property $fechaSalida
 * @property $fechaLlegada
 *
 * @property InventarioHerramienta $inventarioHerramienta
 * @property Usuario $usuario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetallesUtiliza extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['codigoUsuario', 'codigoHerramienta', 'salida', 'fechaSalida', 'fechaLlegada'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventarioHerramienta()
    {
        return $this->belongsTo(\App\Models\InventarioHerramienta::class, 'codigoHerramienta', 'idHerramienta');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class, 'codigoUsuario', 'idUsuario');
    }
    
}
