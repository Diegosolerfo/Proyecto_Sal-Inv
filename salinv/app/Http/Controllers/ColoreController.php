<?php

namespace App\Http\Controllers;

use App\Models\Colore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ColoreRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ColoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $colores = Colore::paginate();

        return view('colore.index', compact('colores'))
            ->with('i', ($request->input('page', 1) - 1) * $colores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $colore = new Colore();

        return view('colore.create', compact('colore'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColoreRequest $request): RedirectResponse
    {
        Colore::create($request->validated());

        return Redirect::route('colores.index')
            ->with('success', 'Colore created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $colore = Colore::find($id);

        return view('colore.show', compact('colore'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $colore = Colore::find($id);

        return view('colore.edit', compact('colore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColoreRequest $request, Colore $colore): RedirectResponse
    {
        $colore->update($request->validated());

        return Redirect::route('colores.index')
            ->with('success', 'Colore updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Colore::find($id)->delete();

        return Redirect::route('colores.index')
            ->with('success', 'Colore deleted successfully');
    }
}
