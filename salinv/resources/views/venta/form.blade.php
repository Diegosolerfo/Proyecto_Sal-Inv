<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_venta" class="form-label">{{ __('Idventa') }}</label>
            <input type="text" name="idVenta" class="form-control @error('idVenta') is-invalid @enderror" value="{{ old('idVenta', $venta?->idVenta) }}" id="id_venta" placeholder="Idventa">
            {!! $errors->first('idVenta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio" class="form-label">{{ __('Precio') }}</label>
            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $venta?->precio) }}" id="precio" placeholder="Precio">
            {!! $errors->first('precio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descuento" class="form-label">{{ __('Descuento') }}</label>
            <input type="text" name="descuento" class="form-control @error('descuento') is-invalid @enderror" value="{{ old('descuento', $venta?->descuento) }}" id="descuento" placeholder="Descuento">
            {!! $errors->first('descuento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_facturacion" class="form-label">{{ __('Fechafacturacion') }}</label>
            <input type="text" name="fechaFacturacion" class="form-control @error('fechaFacturacion') is-invalid @enderror" value="{{ old('fechaFacturacion', $venta?->fechaFacturacion) }}" id="fecha_facturacion" placeholder="Fechafacturacion">
            {!! $errors->first('fechaFacturacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="impuesto" class="form-label">{{ __('Impuesto') }}</label>
            <input type="text" name="impuesto" class="form-control @error('impuesto') is-invalid @enderror" value="{{ old('impuesto', $venta?->impuesto) }}" id="impuesto" placeholder="Impuesto">
            {!! $errors->first('impuesto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cancelacion" class="form-label">{{ __('Cancelacion') }}</label>
            <input type="text" name="cancelacion" class="form-control @error('cancelacion') is-invalid @enderror" value="{{ old('cancelacion', $venta?->cancelacion) }}" id="cancelacion" placeholder="Cancelacion">
            {!! $errors->first('cancelacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_usuario" class="form-label">{{ __('Codigousuario') }}</label>
            <input type="text" name="codigoUsuario" class="form-control @error('codigoUsuario') is-invalid @enderror" value="{{ old('codigoUsuario', $venta?->codigoUsuario) }}" id="codigo_usuario" placeholder="Codigousuario">
            {!! $errors->first('codigoUsuario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_pedido" class="form-label">{{ __('Codigopedido') }}</label>
            <input type="text" name="codigoPedido" class="form-control @error('codigoPedido') is-invalid @enderror" value="{{ old('codigoPedido', $venta?->codigoPedido) }}" id="codigo_pedido" placeholder="Codigopedido">
            {!! $errors->first('codigoPedido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>