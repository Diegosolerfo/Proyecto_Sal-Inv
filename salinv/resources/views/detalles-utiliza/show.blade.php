@extends('layouts.app')

@section('template_title')
    {{ $detallesUtiliza->name ?? __('Show') . " " . __('Detalles Utiliza') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detalles Utiliza</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('detalles-utilizas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigousuario:</strong>
                                    {{ $detallesUtiliza->codigoUsuario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigoherramienta:</strong>
                                    {{ $detallesUtiliza->codigoHerramienta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Salida:</strong>
                                    {{ $detallesUtiliza->salida }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechasalida:</strong>
                                    {{ $detallesUtiliza->fechaSalida }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechallegada:</strong>
                                    {{ $detallesUtiliza->fechaLlegada }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
