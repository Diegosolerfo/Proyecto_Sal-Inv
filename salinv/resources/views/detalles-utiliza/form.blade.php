<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="codigo_usuario" class="form-label">{{ __('Codigousuario') }}</label>
            <input type="text" name="codigoUsuario" class="form-control @error('codigoUsuario') is-invalid @enderror" value="{{ old('codigoUsuario', $detallesUtiliza?->codigoUsuario) }}" id="codigo_usuario" placeholder="Codigousuario">
            {!! $errors->first('codigoUsuario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_herramienta" class="form-label">{{ __('Codigoherramienta') }}</label>
            <input type="text" name="codigoHerramienta" class="form-control @error('codigoHerramienta') is-invalid @enderror" value="{{ old('codigoHerramienta', $detallesUtiliza?->codigoHerramienta) }}" id="codigo_herramienta" placeholder="Codigoherramienta">
            {!! $errors->first('codigoHerramienta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="salida" class="form-label">{{ __('Salida') }}</label>
            <input type="text" name="salida" class="form-control @error('salida') is-invalid @enderror" value="{{ old('salida', $detallesUtiliza?->salida) }}" id="salida" placeholder="Salida">
            {!! $errors->first('salida', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_salida" class="form-label">{{ __('Fechasalida') }}</label>
            <input type="text" name="fechaSalida" class="form-control @error('fechaSalida') is-invalid @enderror" value="{{ old('fechaSalida', $detallesUtiliza?->fechaSalida) }}" id="fecha_salida" placeholder="Fechasalida">
            {!! $errors->first('fechaSalida', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_llegada" class="form-label">{{ __('Fechallegada') }}</label>
            <input type="text" name="fechaLlegada" class="form-control @error('fechaLlegada') is-invalid @enderror" value="{{ old('fechaLlegada', $detallesUtiliza?->fechaLlegada) }}" id="fecha_llegada" placeholder="Fechallegada">
            {!! $errors->first('fechaLlegada', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>