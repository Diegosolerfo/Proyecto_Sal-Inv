<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="codigo_proyecto" class="form-label">{{ __('Codigoproyecto') }}</label>
            <input type="text" name="codigoProyecto" class="form-control @error('codigoProyecto') is-invalid @enderror" value="{{ old('codigoProyecto', $detallesCrea?->codigoProyecto) }}" id="codigo_proyecto" placeholder="Codigoproyecto">
            {!! $errors->first('codigoProyecto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_material" class="form-label">{{ __('Codigomaterial') }}</label>
            <input type="text" name="codigoMaterial" class="form-control @error('codigoMaterial') is-invalid @enderror" value="{{ old('codigoMaterial', $detallesCrea?->codigoMaterial) }}" id="codigo_material" placeholder="Codigomaterial">
            {!! $errors->first('codigoMaterial', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="salida" class="form-label">{{ __('Salida') }}</label>
            <input type="text" name="salida" class="form-control @error('salida') is-invalid @enderror" value="{{ old('salida', $detallesCrea?->salida) }}" id="salida" placeholder="Salida">
            {!! $errors->first('salida', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_salida" class="form-label">{{ __('Fechasalida') }}</label>
            <input type="text" name="fechaSalida" class="form-control @error('fechaSalida') is-invalid @enderror" value="{{ old('fechaSalida', $detallesCrea?->fechaSalida) }}" id="fecha_salida" placeholder="Fechasalida">
            {!! $errors->first('fechaSalida', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="total_inventario" class="form-label">{{ __('Totalinventario') }}</label>
            <input type="text" name="totalInventario" class="form-control @error('totalInventario') is-invalid @enderror" value="{{ old('totalInventario', $detallesCrea?->totalInventario) }}" id="total_inventario" placeholder="Totalinventario">
            {!! $errors->first('totalInventario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lo_tiene" class="form-label">{{ __('Lotiene') }}</label>
            <input type="text" name="loTiene" class="form-control @error('loTiene') is-invalid @enderror" value="{{ old('loTiene', $detallesCrea?->loTiene) }}" id="lo_tiene" placeholder="Lotiene">
            {!! $errors->first('loTiene', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>