<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_material" class="form-label">{{ __('Idmaterial') }}</label>
            <input type="text" name="idMaterial" class="form-control @error('idMaterial') is-invalid @enderror" value="{{ old('idMaterial', $inventario_material?->idMaterial) }}" id="id_material" placeholder="Idmaterial">
            {!! $errors->first('idMaterial', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $inventario_material?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $inventario_material?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cantidad" class="form-label">{{ __('Cantidad') }}</label>
            <input type="text" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror" value="{{ old('cantidad', $inventario_material?->cantidad) }}" id="cantidad" placeholder="Cantidad">
            {!! $errors->first('cantidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_compra" class="form-label">{{ __('Fechacompra') }}</label>
            <input type="text" name="fechaCompra" class="form-control @error('fechaCompra') is-invalid @enderror" value="{{ old('fechaCompra', $inventario_material?->fechaCompra) }}" id="fecha_compra" placeholder="Fechacompra">
            {!! $errors->first('fechaCompra', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="valor_unidad" class="form-label">{{ __('Valorunidad') }}</label>
            <input type="text" name="valorUnidad" class="form-control @error('valorUnidad') is-invalid @enderror" value="{{ old('valorUnidad', $inventario_material?->valorUnidad) }}" id="valor_unidad" placeholder="Valorunidad">
            {!! $errors->first('valorUnidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="valor_total" class="form-label">{{ __('Valortotal') }}</label>
            <input type="text" name="valorTotal" class="form-control @error('valorTotal') is-invalid @enderror" value="{{ old('valorTotal', $inventario_material?->valorTotal) }}" id="valor_total" placeholder="Valortotal">
            {!! $errors->first('valorTotal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="imagen_material" class="form-label">{{ __('Imagenmaterial') }}</label>
            <input type="text" name="imagenMaterial" class="form-control @error('imagenMaterial') is-invalid @enderror" value="{{ old('imagenMaterial', $inventario_material?->imagenMaterial) }}" id="imagen_material" placeholder="Imagenmaterial">
            {!! $errors->first('imagenMaterial', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_registro" class="form-label">{{ __('Fecharegistro') }}</label>
            <input type="text" name="fechaRegistro" class="form-control @error('fechaRegistro') is-invalid @enderror" value="{{ old('fechaRegistro', $inventario_material?->fechaRegistro) }}" id="fecha_registro" placeholder="Fecharegistro">
            {!! $errors->first('fechaRegistro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $inventario_material?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>