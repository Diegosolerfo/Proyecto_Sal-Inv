@extends('layouts.app')

@section('template_title')
    {{ $venta->name ?? __('Show') . " " . __('Venta') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('ventas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idventa:</strong>
                                    {{ $venta->idVenta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio:</strong>
                                    {{ $venta->precio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descuento:</strong>
                                    {{ $venta->descuento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechafacturacion:</strong>
                                    {{ $venta->fechaFacturacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Impuesto:</strong>
                                    {{ $venta->impuesto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cancelacion:</strong>
                                    {{ $venta->cancelacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigousuario:</strong>
                                    {{ $venta->codigoUsuario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigopedido:</strong>
                                    {{ $venta->codigoPedido }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
