@extends('layouts.app')

@section('template_title')
    Detalles Creas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalles Creas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detalles-creas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Codigoproyecto</th>
									<th >Codigomaterial</th>
									<th >Salida</th>
									<th >Fechasalida</th>
									<th >Totalinventario</th>
									<th >Lotiene</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detallesCreas as $detallesCrea)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $detallesCrea->codigoProyecto }}</td>
										<td >{{ $detallesCrea->codigoMaterial }}</td>
										<td >{{ $detallesCrea->salida }}</td>
										<td >{{ $detallesCrea->fechaSalida }}</td>
										<td >{{ $detallesCrea->totalInventario }}</td>
										<td >{{ $detallesCrea->loTiene }}</td>

                                            <td>
                                                <form action="{{ route('detalles-creas.destroy', $detallesCrea->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detalles-creas.show', $detallesCrea->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detalles-creas.edit', $detallesCrea->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $detallesCreas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
