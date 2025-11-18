<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProyectoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $proyectos = Proyecto::paginate();

        return view('proyecto.index', compact('proyectos'))
            ->with('i', ($request->input('page', 1) - 1) * $proyectos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $proyecto = new Proyecto();

        return view('proyecto.create', compact('proyecto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProyectoRequest $request): RedirectResponse
    {
        Proyecto::create($request->validated());

        return Redirect::route('proyectos.index')
            ->with('success', 'Proyecto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $proyecto = Proyecto::find($id);

        return view('proyecto.show', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $proyecto = Proyecto::find($id);

        return view('proyecto.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProyectoRequest $request, Proyecto $proyecto): RedirectResponse
    {
        $proyecto->update($request->validated());

        return Redirect::route('proyectos.index')
            ->with('success', 'Proyecto updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Proyecto::find($id)->delete();

        return Redirect::route('proyectos.index')
            ->with('success', 'Proyecto deleted successfully');
    }
}
