<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_especificacion" class="form-label">{{ __('Idespecificacion') }}</label>
            <input type="text" name="idEspecificacion" class="form-control @error('idEspecificacion') is-invalid @enderror" value="{{ old('idEspecificacion', $especificacionesPedido?->idEspecificacion) }}" id="id_especificacion" placeholder="Idespecificacion">
            {!! $errors->first('idEspecificacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $especificacionesPedido?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $especificacionesPedido?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_pedido" class="form-label">{{ __('Codigopedido') }}</label>
            <input type="text" name="codigoPedido" class="form-control @error('codigoPedido') is-invalid @enderror" value="{{ old('codigoPedido', $especificacionesPedido?->codigoPedido) }}" id="codigo_pedido" placeholder="Codigopedido">
            {!! $errors->first('codigoPedido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>