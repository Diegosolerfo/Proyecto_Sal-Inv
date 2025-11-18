<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InventarioHerramienta
 *
 * @property $idHerramienta
 * @property $nombre
 * @property $tipoHerramienta
 * @property $cantidad
 * @property $imagenHerramienta
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property DetallesUtiliza[] $detallesUtilizas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InventarioHerramienta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['idHerramienta', 'nombre', 'tipoHerramienta', 'cantidad', 'imagenHerramienta', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallesUtilizas()
    {
        return $this->hasMany(\App\Models\DetallesUtiliza::class, 'idHerramienta', 'codigoHerramienta');
    }
    
}
