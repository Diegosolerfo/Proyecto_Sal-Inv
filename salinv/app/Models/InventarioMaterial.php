<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InventarioMaterial
 *
 * @property $idMaterial
 * @property $nombre
 * @property $descripcion
 * @property $cantidad
 * @property $fechaCompra
 * @property $valorUnidad
 * @property $valorTotal
 * @property $imagenMaterial
 * @property $fechaRegistro
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property DetallesCrea[] $detallesCreas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InventarioMaterial extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['idMaterial', 'nombre', 'descripcion', 'cantidad', 'fechaCompra', 'valorUnidad', 'valorTotal', 'imagenMaterial', 'fechaRegistro', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallesCreas()
    {
        return $this->hasMany(\App\Models\DetallesCrea::class, 'idMaterial', 'codigoMaterial');
    }
    
}
