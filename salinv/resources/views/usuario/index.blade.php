@extends('layouts.app')

@section('template_title')
    Usuarios
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Usuarios') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped-columns ">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Idusuario</th>
									<th >Numerodocumento</th>
									<th >Clave</th>
									<th >Nombre</th>
									<th >Apellido</th>
									<th >Correo</th>
									<th >Fechanacimiento</th>
									<th >Direccion</th>
									<th >Genero</th>
									<th >Telefono</th>
									<th >Estadocuenta</th>
									<th >Rol</th>
									<th >Eps</th>
									<th >Rh</th>
									<th >Tiposangre</th>
									<th >Registradopor</th>
                                    <th >Acciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $usuario->idUsuario }}</td>
										<td >{{ $usuario->numeroDocumento }}</td>
										<td >{{ $usuario->clave }}</td>
										<td >{{ $usuario->nombre }}</td>
										<td >{{ $usuario->apellido }}</td>
										<td >{{ $usuario->correo }}</td>
										<td >{{ $usuario->fechaNacimiento }}</td>
										<td >{{ $usuario->direccion }}</td>
										<td >{{ $usuario->genero }}</td>
										<td >{{ $usuario->telefono }}</td>
										<td >{{ $usuario->estadoCuenta }}</td>
										<td >{{ $usuario->rol }}</td>
										<td >{{ $usuario->eps }}</td>
										<td >{{ $usuario->rh }}</td>
										<td >{{ $usuario->tipoSangre }}</td>
										<td >{{ $usuario->registradoPor }}</td>

                                            <td>
                                                <form action="{{ route('usuarios.destroy', $usuario->idUsuario) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('usuarios.show', $usuario->idUsuario) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('usuarios.edit', $usuario->idUsuario) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $usuarios->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
