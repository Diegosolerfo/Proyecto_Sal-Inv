@extends('layouts.app')

@section('template_title')
    {{ $inventarioMaterial->name ?? __('Show') . " " . __('Inventario Material') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Inventario Material</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('inventario_material.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idmaterial:</strong>
                                    {{ $inventarioMaterial->idMaterial }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $inventarioMaterial->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $inventarioMaterial->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad:</strong>
                                    {{ $inventarioMaterial->cantidad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechacompra:</strong>
                                    {{ $inventarioMaterial->fechaCompra }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Valorunidad:</strong>
                                    {{ $inventarioMaterial->valorUnidad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Valortotal:</strong>
                                    {{ $inventarioMaterial->valorTotal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Imagenmaterial:</strong>
                                    {{ $inventarioMaterial->imagenMaterial }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecharegistro:</strong>
                                    {{ $inventarioMaterial->fechaRegistro }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $inventarioMaterial->estado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
