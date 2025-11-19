@extends('layouts.app')

@section('template_title')
    Inventario Herramientas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Inventario Herramientas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('inventario_herramienta.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Idherramienta</th>
									<th >Nombre</th>
									<th >Tipoherramienta</th>
									<th >Cantidad</th>
									<th >Imagenherramienta</th>
									<th >Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventario_herramientas as $inventario_herramienta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $inventario_herramienta->idHerramienta }}</td>
										<td >{{ $inventario_herramienta->nombre }}</td>
										<td >{{ $inventario_herramienta->tipoHerramienta }}</td>
										<td >{{ $inventario_herramienta->cantidad }}</td>
										<td >{{ $inventario_herramienta->imagenHerramienta }}</td>
										<td >{{ $inventario_herramienta->estado }}</td>
                                            <td>
                                                <form action="{{ route('inventario_herramienta.destroy', $inventario_herramienta->idHerramienta) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('inventario_herramienta.show', $inventario_herramienta->idHerramienta) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('inventario_herramienta.edit', $inventario_herramienta->idHerramienta) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $inventario_herramientas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
