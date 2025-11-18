<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_proyecto" class="form-label">{{ __('Idproyecto') }}</label>
            <input type="text" name="idProyecto" class="form-control @error('idProyecto') is-invalid @enderror" value="{{ old('idProyecto', $proyecto?->idProyecto) }}" id="id_proyecto" placeholder="Idproyecto">
            {!! $errors->first('idProyecto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio" class="form-label">{{ __('Precio') }}</label>
            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $proyecto?->precio) }}" id="precio" placeholder="Precio">
            {!! $errors->first('precio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $proyecto?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $proyecto?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $proyecto?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="imagen" class="form-label">{{ __('Imagen') }}</label>
            <input type="text" name="imagen" class="form-control @error('imagen') is-invalid @enderror" value="{{ old('imagen', $proyecto?->imagen) }}" id="imagen" placeholder="Imagen">
            {!! $errors->first('imagen', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_usuario" class="form-label">{{ __('Codigousuario') }}</label>
            <input type="text" name="codigoUsuario" class="form-control @error('codigoUsuario') is-invalid @enderror" value="{{ old('codigoUsuario', $proyecto?->codigoUsuario) }}" id="codigo_usuario" placeholder="Codigousuario">
            {!! $errors->first('codigoUsuario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_pedido" class="form-label">{{ __('Codigopedido') }}</label>
            <input type="text" name="codigoPedido" class="form-control @error('codigoPedido') is-invalid @enderror" value="{{ old('codigoPedido', $proyecto?->codigoPedido) }}" id="codigo_pedido" placeholder="Codigopedido">
            {!! $errors->first('codigoPedido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>