<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Materiale
 *
 * @property $idMaterial
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Pedido[] $pedidos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Materiale extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['idMaterial', 'nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany(\App\Models\Pedido::class, 'idMaterial', 'codigoMaterial');
    }
    
}
