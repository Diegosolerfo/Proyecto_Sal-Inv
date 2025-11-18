<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    public function index(Request $request): View
    {
        $categorias = Categoria::paginate();

        return view('categoria.index', compact('categorias'))
            ->with('i', ($request->input('page', 1) - 1));
    }

    public function create(): View
    {
        $categoria = new Categoria();
        return view('categoria.create', compact('categoria'));
    }

    public function store(CategoriaRequest $request): RedirectResponse
    {
        Categoria::create($request->validated());

        return Redirect::route('categorias.index')
            ->with('success', 'Categoria created successfully.');
    }

    public function show($id): View
    {
        $categoria = Categoria::findOrFail($id);

        return view('categoria.show', compact('categoria'));
    }

    public function edit($id): View
    {
        $categoria = Categoria::findOrFail($id);

        return view('categoria.edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request, Categoria $categoria): RedirectResponse
    {
        $categoria->update($request->validated());

        return Redirect::route('categorias.index')
            ->with('success', 'Categoria updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Categoria::findOrFail($id)->delete();

        return Redirect::route('categorias.index')
            ->with('success', 'Categoria deleted successfully');
    }
}
