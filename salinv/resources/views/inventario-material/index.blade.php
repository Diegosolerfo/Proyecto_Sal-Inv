@extends('layouts.app')

@section('template_title')
    Inventario Materials
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Inventario Materials') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('inventario-materials.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Idmaterial</th>
									<th >Nombre</th>
									<th >Descripcion</th>
									<th >Cantidad</th>
									<th >Fechacompra</th>
									<th >Valorunidad</th>
									<th >Valortotal</th>
									<th >Imagenmaterial</th>
									<th >Fecharegistro</th>
									<th >Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventarioMaterials as $inventarioMaterial)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $inventarioMaterial->idMaterial }}</td>
										<td >{{ $inventarioMaterial->nombre }}</td>
										<td >{{ $inventarioMaterial->descripcion }}</td>
										<td >{{ $inventarioMaterial->cantidad }}</td>
										<td >{{ $inventarioMaterial->fechaCompra }}</td>
										<td >{{ $inventarioMaterial->valorUnidad }}</td>
										<td >{{ $inventarioMaterial->valorTotal }}</td>
										<td >{{ $inventarioMaterial->imagenMaterial }}</td>
										<td >{{ $inventarioMaterial->fechaRegistro }}</td>
										<td >{{ $inventarioMaterial->estado }}</td>

                                            <td>
                                                <form action="{{ route('inventario-materials.destroy', $inventarioMaterial->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('inventario-materials.show', $inventarioMaterial->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('inventario-materials.edit', $inventarioMaterial->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $inventarioMaterials->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
