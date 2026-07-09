<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;

class ActualiteController extends Controller
{
    public function index()
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $actualites = Actualite::orderBy('date_publication', 'desc')->get();
        return view('admin.actualites.index', ['actualites' => $actualites]);
    }

    public function create()
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        return view('admin.actualites.create');
    }

    public function store(Request $request)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $data = $request->validate([
            'titre'            => 'required|string|max:200',
            'categorie'        => 'required|string|max:100',
            'extrait'          => 'required|string|max:500',
            'contenu'          => 'required|string',
            'image'            => 'nullable|url|max:500',
            'date_publication' => 'nullable|date',
        ]);

        Actualite::create($data);

        return redirect()->route('admin.actualites.index')->with('success', 'Actualité publiée avec succès.');
    }

    public function edit(Actualite $actualite)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        return view('admin.actualites.edit', ['actualite' => $actualite]);
    }

    public function update(Request $request, Actualite $actualite)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $data = $request->validate([
            'titre'            => 'required|string|max:200',
            'categorie'        => 'required|string|max:100',
            'extrait'          => 'required|string|max:500',
            'contenu'          => 'required|string',
            'image'            => 'nullable|url|max:500',
            'date_publication' => 'nullable|date',
        ]);

        $actualite->update($data);

        return redirect()->route('admin.actualites.index')->with('success', 'Actualité modifiée avec succès.');
    }

    public function destroy(Actualite $actualite)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $actualite->delete();

        return redirect()->route('admin.actualites.index')->with('success', 'Actualité supprimée.');
    }

    public function show(Actualite $actualite)
    {
        return view('pages.article', ['article' => $actualite]);
    }
}