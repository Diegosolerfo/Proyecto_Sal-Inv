<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 *
 * @property $idUsuario
 * @property $numeroDocumento
 * @property $clave
 * @property $nombre
 * @property $apellido
 * @property $correo
 * @property $fechaNacimiento
 * @property $direccion
 * @property $genero
 * @property $telefono
 * @property $estadoCuenta
 * @property $rol
 * @property $eps
 * @property $rh
 * @property $tipoSangre
 * @property $registradoPor
 * @property $created_at
 * @property $updated_at
 *
 * @property Usuario $usuario
 * @property Venta[] $ventas
 * @property DetallesCrea[] $detallesCreas
 * @property DetallesUtiliza[] $detallesUtilizas
 * @property Pedido[] $pedidos
 * @property Proyecto[] $proyectos
 * @property Usuario[] $usuarios
 * @property Venta[] $ventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['idUsuario', 'numeroDocumento', 'clave', 'nombre', 'apellido', 'correo', 'fechaNacimiento', 'direccion', 'genero', 'telefono', 'estadoCuenta', 'rol', 'eps', 'rh', 'tipoSangre', 'registradoPor'];
    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class, 'registradoPor', 'idUsuario');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany(\App\Models\Venta::class, 'cedula', 'cliente_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallesCreas()
    {
        return $this->hasMany(\App\Models\DetallesCrea::class, 'idUsuario', 'loTiene');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallesUtilizas()
    {
        return $this->hasMany(\App\Models\DetallesUtiliza::class, 'idUsuario', 'codigoUsuario');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany(\App\Models\Pedido::class, 'idUsuario', 'codigoUsuario');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectos()
    {
        return $this->hasMany(\App\Models\Proyecto::class, 'idUsuario', 'codigoUsuario');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany(\App\Models\Usuario::class, 'idUsuario', 'registradoPor');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas_2()
    {
        return $this->hasMany(\App\Models\Venta::class, 'idUsuario', 'codigoUsuario');
    }
    
}
