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
        $inventario_herramientas = InventarioHerramienta::paginate();
        return view('inventario_herramienta.index', compact('inventario_herramientas'))
            ->with('i', ($request->input('page', 1) - 1) * $inventario_herramientas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $inventario_herramienta = new InventarioHerramienta();

        return view('inventario_herramienta.create', compact('inventario_herramienta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventarioHerramientaRequest $request): RedirectResponse
    {
        InventarioHerramienta::create($request->validated());

        return Redirect::route('inventario_herramienta.index')
            ->with('success', 'InventarioHerramienta created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $inventario_herramienta = InventarioHerramienta::find($id);

        return view('inventario_herramienta.show', compact('inventario_herramienta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $inventario_herramienta = InventarioHerramienta::find($id);

        return view('inventario_herramienta.edit', compact('inventario_herramienta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventarioHerramientaRequest $request, $id): RedirectResponse
    {
        $inventario_herramienta = InventarioHerramienta::find($id);

        $inventario_herramienta->update($request->validated());

        return Redirect::route('inventario_herramienta.index')
            ->with('success', 'InventarioHerramienta updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        InventarioHerramienta::find($id)->delete();

        return Redirect::route('inventario_herramienta.index')
            ->with('success', 'InventarioHerramienta deleted successfully');
    }
}
