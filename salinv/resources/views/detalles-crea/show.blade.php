@extends('layouts.app')

@section('template_title')
    {{ $detallesCrea->name ?? __('Show') . " " . __('Detalles Crea') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detalles Crea</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('detalles-creas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigoproyecto:</strong>
                                    {{ $detallesCrea->codigoProyecto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigomaterial:</strong>
                                    {{ $detallesCrea->codigoMaterial }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Salida:</strong>
                                    {{ $detallesCrea->salida }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechasalida:</strong>
                                    {{ $detallesCrea->fechaSalida }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Totalinventario:</strong>
                                    {{ $detallesCrea->totalInventario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Lotiene:</strong>
                                    {{ $detallesCrea->loTiene }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
