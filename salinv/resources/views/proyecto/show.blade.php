@extends('layouts.app')

@section('template_title')
    {{ $proyecto->name ?? __('Show') . " " . __('Proyecto') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Proyecto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('proyectos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idproyecto:</strong>
                                    {{ $proyecto->idProyecto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio:</strong>
                                    {{ $proyecto->precio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $proyecto->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $proyecto->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $proyecto->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Imagen:</strong>
                                    {{ $proyecto->imagen }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigousuario:</strong>
                                    {{ $proyecto->codigoUsuario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigopedido:</strong>
                                    {{ $proyecto->codigoPedido }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
