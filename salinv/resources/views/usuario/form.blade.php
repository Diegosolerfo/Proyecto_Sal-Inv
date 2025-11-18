<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_usuario" class="form-label">{{ __('Idusuario') }}</label>
            <input type="text" name="idUsuario" class="form-control @error('idUsuario') is-invalid @enderror" value="{{ old('idUsuario', $usuario?->idUsuario) }}" id="id_usuario" placeholder="Idusuario">
            {!! $errors->first('idUsuario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="numero_documento" class="form-label">{{ __('Numerodocumento') }}</label>
            <input type="text" name="numeroDocumento" class="form-control @error('numeroDocumento') is-invalid @enderror" value="{{ old('numeroDocumento', $usuario?->numeroDocumento) }}" id="numero_documento" placeholder="Numerodocumento">
            {!! $errors->first('numeroDocumento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="clave" class="form-label">{{ __('Clave') }}</label>
            <input type="text" name="clave" class="form-control @error('clave') is-invalid @enderror" value="{{ old('clave', $usuario?->clave) }}" id="clave" placeholder="Clave">
            {!! $errors->first('clave', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $usuario?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellido" class="form-label">{{ __('Apellido') }}</label>
            <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido', $usuario?->apellido) }}" id="apellido" placeholder="Apellido">
            {!! $errors->first('apellido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="correo" class="form-label">{{ __('Correo') }}</label>
            <input type="text" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo', $usuario?->correo) }}" id="correo" placeholder="Correo">
            {!! $errors->first('correo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_nacimiento" class="form-label">{{ __('Fechanacimiento') }}</label>
            <input type="text" name="fechaNacimiento" class="form-control @error('fechaNacimiento') is-invalid @enderror" value="{{ old('fechaNacimiento', $usuario?->fechaNacimiento) }}" id="fecha_nacimiento" placeholder="Fechanacimiento">
            {!! $errors->first('fechaNacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $usuario?->direccion) }}" id="direccion" placeholder="Direccion">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="genero" class="form-label">{{ __('Genero') }}</label>
            <input type="text" name="genero" class="form-control @error('genero') is-invalid @enderror" value="{{ old('genero', $usuario?->genero) }}" id="genero" placeholder="Genero">
            {!! $errors->first('genero', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $usuario?->telefono) }}" id="telefono" placeholder="Telefono">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado_cuenta" class="form-label">{{ __('Estadocuenta') }}</label>
            <input type="text" name="estadoCuenta" class="form-control @error('estadoCuenta') is-invalid @enderror" value="{{ old('estadoCuenta', $usuario?->estadoCuenta) }}" id="estado_cuenta" placeholder="Estadocuenta">
            {!! $errors->first('estadoCuenta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rol" class="form-label">{{ __('Rol') }}</label>
            <input type="text" name="rol" class="form-control @error('rol') is-invalid @enderror" value="{{ old('rol', $usuario?->rol) }}" id="rol" placeholder="Rol">
            {!! $errors->first('rol', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="eps" class="form-label">{{ __('Eps') }}</label>
            <input type="text" name="eps" class="form-control @error('eps') is-invalid @enderror" value="{{ old('eps', $usuario?->eps) }}" id="eps" placeholder="Eps">
            {!! $errors->first('eps', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rh" class="form-label">{{ __('Rh') }}</label>
            <input type="text" name="rh" class="form-control @error('rh') is-invalid @enderror" value="{{ old('rh', $usuario?->rh) }}" id="rh" placeholder="Rh">
            {!! $errors->first('rh', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_sangre" class="form-label">{{ __('Tiposangre') }}</label>
            <input type="text" name="tipoSangre" class="form-control @error('tipoSangre') is-invalid @enderror" value="{{ old('tipoSangre', $usuario?->tipoSangre) }}" id="tipo_sangre" placeholder="Tiposangre">
            {!! $errors->first('tipoSangre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="registrado_por" class="form-label">{{ __('Registradopor') }}</label>
            <input type="text" name="registradoPor" class="form-control @error('registradoPor') is-invalid @enderror" value="{{ old('registradoPor', $usuario?->registradoPor) }}" id="registrado_por" placeholder="Registradopor">
            {!! $errors->first('registradoPor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>