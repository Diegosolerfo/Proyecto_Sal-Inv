@extends('layouts.app')

@section('template_title')
    {{ $inventarioHerramienta->name ?? __('Show') . " " . __('Inventario Herramienta') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Inventario Herramienta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('inventario-herramientas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idherramienta:</strong>
                                    {{ $inventarioHerramienta->idHerramienta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $inventarioHerramienta->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipoherramienta:</strong>
                                    {{ $inventarioHerramienta->tipoHerramienta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad:</strong>
                                    {{ $inventarioHerramienta->cantidad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Imagenherramienta:</strong>
                                    {{ $inventarioHerramienta->imagenHerramienta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $inventarioHerramienta->estado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
