@extends('layouts.app')

@section('template_title')
    {{ $usuario->name ?? __('Show') . " " . __('Usuario') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('usuarios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idusuario:</strong>
                                    {{ $usuario->idUsuario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Numerodocumento:</strong>
                                    {{ $usuario->numeroDocumento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Clave:</strong>
                                    {{ $usuario->clave }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $usuario->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido:</strong>
                                    {{ $usuario->apellido }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correo:</strong>
                                    {{ $usuario->correo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechanacimiento:</strong>
                                    {{ $usuario->fechaNacimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $usuario->direccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Genero:</strong>
                                    {{ $usuario->genero }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $usuario->telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estadocuenta:</strong>
                                    {{ $usuario->estadoCuenta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rol:</strong>
                                    {{ $usuario->rol }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Eps:</strong>
                                    {{ $usuario->eps }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rh:</strong>
                                    {{ $usuario->rh }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tiposangre:</strong>
                                    {{ $usuario->tipoSangre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Registradopor:</strong>
                                    {{ $usuario->registradoPor }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
