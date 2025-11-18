<?php

namespace App\Http\Controllers;

use App\Models\Materiale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MaterialeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MaterialeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $materiales = Materiale::paginate();

        return view('materiale.index', compact('materiales'))
            ->with('i', ($request->input('page', 1) - 1) * $materiales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $materiale = new Materiale();

        return view('materiale.create', compact('materiale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialeRequest $request): RedirectResponse
    {
        Materiale::create($request->validated());

        return Redirect::route('materiales.index')
            ->with('success', 'Materiale created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $materiale = Materiale::find($id);

        return view('materiale.show', compact('materiale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $materiale = Materiale::find($id);

        return view('materiale.edit', compact('materiale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialeRequest $request, Materiale $materiale): RedirectResponse
    {
        $materiale->update($request->validated());

        return Redirect::route('materiales.index')
            ->with('success', 'Materiale updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Materiale::find($id)->delete();

        return Redirect::route('materiales.index')
            ->with('success', 'Materiale deleted successfully');
    }
}
