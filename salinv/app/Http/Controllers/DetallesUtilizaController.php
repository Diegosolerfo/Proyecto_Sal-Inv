<?php

namespace App\Http\Controllers;

use App\Models\DetallesUtiliza;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetallesUtilizaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DetallesUtilizaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $detallesUtilizas = DetallesUtiliza::paginate();

        return view('detalles-utiliza.index', compact('detallesUtilizas'))
            ->with('i', ($request->input('page', 1) - 1) * $detallesUtilizas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $detallesUtiliza = new DetallesUtiliza();

        return view('detalles-utiliza.create', compact('detallesUtiliza'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetallesUtilizaRequest $request): RedirectResponse
    {
        DetallesUtiliza::create($request->validated());

        return Redirect::route('detalles-utilizas.index')
            ->with('success', 'DetallesUtiliza created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $detallesUtiliza = DetallesUtiliza::find($id);

        return view('detalles-utiliza.show', compact('detallesUtiliza'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $detallesUtiliza = DetallesUtiliza::find($id);

        return view('detalles-utiliza.edit', compact('detallesUtiliza'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetallesUtilizaRequest $request, DetallesUtiliza $detallesUtiliza): RedirectResponse
    {
        $detallesUtiliza->update($request->validated());

        return Redirect::route('detalles-utilizas.index')
            ->with('success', 'DetallesUtiliza updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        DetallesUtiliza::find($id)->delete();

        return Redirect::route('detalles-utilizas.index')
            ->with('success', 'DetallesUtiliza deleted successfully');
    }
}
