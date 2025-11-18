<?php

namespace App\Http\Controllers;

use App\Models\DetallesCrea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetallesCreaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DetallesCreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $detallesCreas = DetallesCrea::paginate();

        return view('detalles-crea.index', compact('detallesCreas'))
            ->with('i', ($request->input('page', 1) - 1) * $detallesCreas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $detallesCrea = new DetallesCrea();

        return view('detalles-crea.create', compact('detallesCrea'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetallesCreaRequest $request): RedirectResponse
    {
        DetallesCrea::create($request->validated());

        return Redirect::route('detalles-creas.index')
            ->with('success', 'DetallesCrea created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $detallesCrea = DetallesCrea::find($id);

        return view('detalles-crea.show', compact('detallesCrea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $detallesCrea = DetallesCrea::find($id);

        return view('detalles-crea.edit', compact('detallesCrea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetallesCreaRequest $request, DetallesCrea $detallesCrea): RedirectResponse
    {
        $detallesCrea->update($request->validated());

        return Redirect::route('detalles-creas.index')
            ->with('success', 'DetallesCrea updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        DetallesCrea::find($id)->delete();

        return Redirect::route('detalles-creas.index')
            ->with('success', 'DetallesCrea deleted successfully');
    }
}
