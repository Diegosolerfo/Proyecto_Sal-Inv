@extends('layouts.app')

@section('template_title')
    {{ $pedido->name ?? __('Show') . " " . __('Pedido') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pedidos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idpedido:</strong>
                                    {{ $pedido->idPedido }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigocategoria:</strong>
                                    {{ $pedido->codigoCategoria }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $pedido->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Abono:</strong>
                                    {{ $pedido->abono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechasolicitud:</strong>
                                    {{ $pedido->fechaSolicitud }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechaentrega:</strong>
                                    {{ $pedido->fechaEntrega }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechavisita:</strong>
                                    {{ $pedido->fechaVisita }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $pedido->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigocolor:</strong>
                                    {{ $pedido->codigoColor }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigomaterial:</strong>
                                    {{ $pedido->codigoMaterial }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigousuario:</strong>
                                    {{ $pedido->codigoUsuario }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
