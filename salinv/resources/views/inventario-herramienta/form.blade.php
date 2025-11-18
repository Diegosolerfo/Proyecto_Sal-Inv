<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_herramienta" class="form-label">{{ __('Idherramienta') }}</label>
            <input type="text" name="idHerramienta" class="form-control @error('idHerramienta') is-invalid @enderror" value="{{ old('idHerramienta', $inventarioHerramienta?->idHerramienta) }}" id="id_herramienta" placeholder="Idherramienta">
            {!! $errors->first('idHerramienta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $inventarioHerramienta?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_herramienta" class="form-label">{{ __('Tipoherramienta') }}</label>
            <input type="text" name="tipoHerramienta" class="form-control @error('tipoHerramienta') is-invalid @enderror" value="{{ old('tipoHerramienta', $inventarioHerramienta?->tipoHerramienta) }}" id="tipo_herramienta" placeholder="Tipoherramienta">
            {!! $errors->first('tipoHerramienta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cantidad" class="form-label">{{ __('Cantidad') }}</label>
            <input type="text" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror" value="{{ old('cantidad', $inventarioHerramienta?->cantidad) }}" id="cantidad" placeholder="Cantidad">
            {!! $errors->first('cantidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="imagen_herramienta" class="form-label">{{ __('Imagenherramienta') }}</label>
            <input type="text" name="imagenHerramienta" class="form-control @error('imagenHerramienta') is-invalid @enderror" value="{{ old('imagenHerramienta', $inventarioHerramienta?->imagenHerramienta) }}" id="imagen_herramienta" placeholder="Imagenherramienta">
            {!! $errors->first('imagenHerramienta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $inventarioHerramienta?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>