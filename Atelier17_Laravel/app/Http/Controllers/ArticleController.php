<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article= Article::all();
        return view('welcome',['article'=>$article]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.ajouter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

        $request->validate([
            'nom' => 'required|max:255',
            'categorie' => 'required',
            'image' => 'required',
            'description' => 'required',
            'localisation' => 'required',
            'statut' => 'required',
        ]);
        $article = new Article();
        $this->authorize('create', $article);
        $article->nom = $request->nom;
        $article->categorie = $request->categorie;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'),$filename);
            $article['image']=$filename;
        }
        $article->description = $request->description;
        $article->user_id = Auth::user()->id;
        $article->localisation = $request->localisation;
        $article->statut = $request->statut;
        
        $article->save();

        return redirect('/newarticle')->with('statut', "Bien Immobilier enregistré avec succès");

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {  
        $article=Article::find($id);
        $this->authorize('viewany', $article);
        $admins =User::where('id','=',$article->user_id)->first();
        return view('articles.voirplus',['article'=>$article, 'admins'=>$admins]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        
        $article=Article::find($id);
        $this->authorize('update', $article);
        $admins=User::all();
        return view('articles.modifierArticles',compact('admins','article'));
      
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
        $article= Article::find($request->id);
        $this->authorize('update', $article);
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
        $this->authorize('delete', Article::class);
    }
}
