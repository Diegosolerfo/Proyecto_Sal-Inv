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
        $inventarioMaterials = InventarioMaterial::paginate();

        return view('inventario-material.index', compact('inventarioMaterials'))
            ->with('i', ($request->input('page', 1) - 1) * $inventarioMaterials->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $inventarioMaterial = new InventarioMaterial();

        return view('inventario-material.create', compact('inventarioMaterial'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventarioMaterialRequest $request): RedirectResponse
    {
        InventarioMaterial::create($request->validated());

        return Redirect::route('inventario-materials.index')
            ->with('success', 'InventarioMaterial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $inventarioMaterial = InventarioMaterial::find($id);

        return view('inventario-material.show', compact('inventarioMaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $inventarioMaterial = InventarioMaterial::find($id);

        return view('inventario-material.edit', compact('inventarioMaterial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventarioMaterialRequest $request, InventarioMaterial $inventarioMaterial): RedirectResponse
    {
        $inventarioMaterial->update($request->validated());

        return Redirect::route('inventario-materials.index')
            ->with('success', 'InventarioMaterial updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        InventarioMaterial::find($id)->delete();

        return Redirect::route('inventario-materials.index')
            ->with('success', 'InventarioMaterial deleted successfully');
    }
}
