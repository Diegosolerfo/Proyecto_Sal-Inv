@extends('layouts.app')

@section('template_title')
    {{ $especificacionesPedido->name ?? __('Show') . " " . __('Especificaciones Pedido') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Especificaciones Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('especificaciones-pedidos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idespecificacion:</strong>
                                    {{ $especificacionesPedido->idEspecificacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $especificacionesPedido->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $especificacionesPedido->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigopedido:</strong>
                                    {{ $especificacionesPedido->codigoPedido }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
