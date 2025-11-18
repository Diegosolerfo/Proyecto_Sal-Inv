<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_pedido" class="form-label">{{ __('Idpedido') }}</label>
            <input type="text" name="idPedido" class="form-control @error('idPedido') is-invalid @enderror" value="{{ old('idPedido', $pedido?->idPedido) }}" id="id_pedido" placeholder="Idpedido">
            {!! $errors->first('idPedido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_categoria" class="form-label">{{ __('Codigocategoria') }}</label>
            <input type="text" name="codigoCategoria" class="form-control @error('codigoCategoria') is-invalid @enderror" value="{{ old('codigoCategoria', $pedido?->codigoCategoria) }}" id="codigo_categoria" placeholder="Codigocategoria">
            {!! $errors->first('codigoCategoria', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $pedido?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="abono" class="form-label">{{ __('Abono') }}</label>
            <input type="text" name="abono" class="form-control @error('abono') is-invalid @enderror" value="{{ old('abono', $pedido?->abono) }}" id="abono" placeholder="Abono">
            {!! $errors->first('abono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_solicitud" class="form-label">{{ __('Fechasolicitud') }}</label>
            <input type="text" name="fechaSolicitud" class="form-control @error('fechaSolicitud') is-invalid @enderror" value="{{ old('fechaSolicitud', $pedido?->fechaSolicitud) }}" id="fecha_solicitud" placeholder="Fechasolicitud">
            {!! $errors->first('fechaSolicitud', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_entrega" class="form-label">{{ __('Fechaentrega') }}</label>
            <input type="text" name="fechaEntrega" class="form-control @error('fechaEntrega') is-invalid @enderror" value="{{ old('fechaEntrega', $pedido?->fechaEntrega) }}" id="fecha_entrega" placeholder="Fechaentrega">
            {!! $errors->first('fechaEntrega', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_visita" class="form-label">{{ __('Fechavisita') }}</label>
            <input type="text" name="fechaVisita" class="form-control @error('fechaVisita') is-invalid @enderror" value="{{ old('fechaVisita', $pedido?->fechaVisita) }}" id="fecha_visita" placeholder="Fechavisita">
            {!! $errors->first('fechaVisita', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $pedido?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_color" class="form-label">{{ __('Codigocolor') }}</label>
            <input type="text" name="codigoColor" class="form-control @error('codigoColor') is-invalid @enderror" value="{{ old('codigoColor', $pedido?->codigoColor) }}" id="codigo_color" placeholder="Codigocolor">
            {!! $errors->first('codigoColor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_material" class="form-label">{{ __('Codigomaterial') }}</label>
            <input type="text" name="codigoMaterial" class="form-control @error('codigoMaterial') is-invalid @enderror" value="{{ old('codigoMaterial', $pedido?->codigoMaterial) }}" id="codigo_material" placeholder="Codigomaterial">
            {!! $errors->first('codigoMaterial', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_usuario" class="form-label">{{ __('Codigousuario') }}</label>
            <input type="text" name="codigoUsuario" class="form-control @error('codigoUsuario') is-invalid @enderror" value="{{ old('codigoUsuario', $pedido?->codigoUsuario) }}" id="codigo_usuario" placeholder="Codigousuario">
            {!! $errors->first('codigoUsuario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>