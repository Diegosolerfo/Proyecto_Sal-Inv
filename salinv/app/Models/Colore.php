<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Colore
 *
 * @property $idColor
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Pedido[] $pedidos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Colore extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['idColor', 'nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany(\App\Models\Pedido::class, 'idColor', 'codigoColor');
    }
    
}
