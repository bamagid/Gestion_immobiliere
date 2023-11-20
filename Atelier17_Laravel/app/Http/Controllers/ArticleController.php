<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return 'SALAM';
        return view('articles.ajouter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            // 'categorie' => 'required',
            "image" => 'required|image|max:1024',
            'description' => 'required',
            'localisation' => 'required',
            'statut' => 'required',
        ]);

        $chemin_image = $request->image->store("articles");

        $article = new Article();
        $article->nom = $request->nom;
        // $article->categorie = $request->categorie;
        $article->image = $chemin_image;
        $article->description = $request->description;
        $article->localisation = $request->localisation;
        $article->statut = $request->statut;
        $article->save();

        return redirect('/newarticle')->with('statut', "Bien Immobilier enregistré avec succès");

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
