<?php

namespace App\Http\Controllers;

use App\Models\EspecificacionesPedido;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EspecificacionesPedidoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EspecificacionesPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $especificacionesPedidos = EspecificacionesPedido::paginate();

        return view('especificaciones-pedido.index', compact('especificacionesPedidos'))
            ->with('i', ($request->input('page', 1) - 1) * $especificacionesPedidos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $especificacionesPedido = new EspecificacionesPedido();

        return view('especificaciones-pedido.create', compact('especificacionesPedido'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EspecificacionesPedidoRequest $request): RedirectResponse
    {
        EspecificacionesPedido::create($request->validated());

        return Redirect::route('especificaciones-pedidos.index')
            ->with('success', 'EspecificacionesPedido created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $especificacionesPedido = EspecificacionesPedido::find($id);

        return view('especificaciones-pedido.show', compact('especificacionesPedido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $especificacionesPedido = EspecificacionesPedido::find($id);

        return view('especificaciones-pedido.edit', compact('especificacionesPedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EspecificacionesPedidoRequest $request, EspecificacionesPedido $especificacionesPedido): RedirectResponse
    {
        $especificacionesPedido->update($request->validated());

        return Redirect::route('especificaciones-pedidos.index')
            ->with('success', 'EspecificacionesPedido updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        EspecificacionesPedido::find($id)->delete();

        return Redirect::route('especificaciones-pedidos.index')
            ->with('success', 'EspecificacionesPedido deleted successfully');
    }
}
