<?php

namespace App\Http\Controllers;

use App\Models\InventarioHerramienta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\InventarioHerramientaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class InventarioHerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $inventarioHerramientas = InventarioHerramienta::paginate();

        return view('inventario-herramienta.index', compact('inventarioHerramientas'))
            ->with('i', ($request->input('page', 1) - 1) * $inventarioHerramientas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $inventarioHerramienta = new InventarioHerramienta();

        return view('inventario-herramienta.create', compact('inventarioHerramienta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventarioHerramientaRequest $request): RedirectResponse
    {
        InventarioHerramienta::create($request->validated());

        return Redirect::route('inventario-herramientas.index')
            ->with('success', 'InventarioHerramienta created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $inventarioHerramienta = InventarioHerramienta::find($id);

        return view('inventario-herramienta.show', compact('inventarioHerramienta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $inventarioHerramienta = InventarioHerramienta::find($id);

        return view('inventario-herramienta.edit', compact('inventarioHerramienta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventarioHerramientaRequest $request, InventarioHerramienta $inventarioHerramienta): RedirectResponse
    {
        $inventarioHerramienta->update($request->validated());

        return Redirect::route('inventario-herramientas.index')
            ->with('success', 'InventarioHerramienta updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        InventarioHerramienta::find($id)->delete();

        return Redirect::route('inventario-herramientas.index')
            ->with('success', 'InventarioHerramienta deleted successfully');
    }
}
