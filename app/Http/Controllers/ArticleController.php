<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $article= Article::all();
        $admins=Admin::all();
        return view("articles",['article'=>$article,'admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article=Article::find($id);
        $admins =Admin::where('id','=',$article->admin_id)->first();
        return view('voirplus',['article'=>$article, 'admins'=>$admins]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $article=Article::find($id);
        $admins=Admin::all();
        return view('modifierArticles',compact('admins','article'));
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      
        $request->validate([
            'nom' => 'required',
            'image' => 'required',
            'description' => 'required',
            'localisation' => 'required',
            'statut' => 'required',
        ]);
       
        // $article = new Article();
        $article= Article::find($request->id);
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->image = $request->image;
        $article->localisation = $request->localisation;
        $article->statut = $request->statut;
        $article->admin_id =  Auth::user()->id;
        $article->update();
    

        return redirect('/articles/'. $request->id)->with('statut', "Bien Immobilier modifier avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
