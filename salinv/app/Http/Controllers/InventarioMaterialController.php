<?php

namespace App\Http\Controllers;

use App\Models\InventarioMaterial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\InventarioMaterialRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class InventarioMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $inventario_material = InventarioMaterial::paginate();

        return view('inventario_material.index', compact('inventario_material'))
            ->with('i', ($request->input('page', 1) - 1) * $inventario_material->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $inventario_material = new InventarioMaterial();

        return view('inventario_material.create', compact('inventario_material'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventarioMaterialRequest $request): RedirectResponse
    {
        InventarioMaterial::create($request->validated());

        return Redirect::route('inventario_material.index')
            ->with('success', 'InventarioMaterial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $inventario_material = InventarioMaterial::find($id);

        return view('inventario_material.show', compact('inventario_material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $inventario_material = InventarioMaterial::find($id);

        return view('inventario_material.edit', compact('inventario_material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventarioMaterialRequest $request, InventarioMaterial $inventarioMaterial): RedirectResponse
    {
        $inventarioMaterial->update($request->validated());

        return Redirect::route('inventario_material.index')
            ->with('success', 'InventarioMaterial updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        InventarioMaterial::find($id)->delete();

        return Redirect::route('inventario_material.index')
            ->with('success', 'InventarioMaterial deleted successfully');
    }
}
