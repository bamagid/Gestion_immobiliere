<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Article;
use App\Models\Chambre;
use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Console\View\Components\Choice;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(6);
        return view('articles.listearticles', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Article $article)
    {
        $this->authorize('View', $article);
        $ok='no';
        return view('articles.ajouter',compact('ok'));
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
            'nombreToilette'=>'required|numeric|min:1',
            'nombreBalcon'=>'required|numeric',
            'dimension'=>'required|numeric|min:10',
            'nombreChambre'=>'required|numeric',
            'espaceVert'=>'required'
            
        ]);
        $article = new Article();
        $this->authorize('create', $article);
        $article->nom = $request->nom;
        $article->categorie = $request->categorie;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $article['image'] = $filename;
        }
        $article->description = $request->description;
        $article->user_id = Auth::user()->id;
        $article->localisation = $request->localisation;
        $article->statut = $request->statut;
        $article->nombreToilette = $request->nombreToilette;
        $article->nombreBalcon = $request->nombreBalcon;
        $article->dimension = $request->dimension;
        $article->nombreChambre = $request->nombreChambre;
        $article->espaceVert = $request->espaceVert;
        $article->save();
        $bien=$article;
        $ok='no';
        return view('articles.ajouterChambre',compact('bien','ok'));
    }

    /**
     * Display the specified resource.
     */
    public function shows($id)
    {
        $articles= Article::find($id);
        return view('articles.voirplus', ['articles' => $articles]);
    }

    /**
     * Display the specified resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $this->authorize('View', $article);
        $articles = Article::where('user_id',Auth::user()->id)->paginate(6);
        return view('articles.myposts', ['articles' => $articles]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id,Article $article)
    {

        $this->authorize('Viewany', $article);
        $ok='ok';
        $articles = Article::find($id);
        $admins = User::all();
        return view('articles.ajouter', compact('admins', 'articles','ok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            'nom' => 'required|max:255',
            'categorie' => 'required',
            'image' => 'somtimes',
            'description' => 'required',
            'localisation' => 'required',
            'statut' => 'required',
            'nombreToilette'=>'required|numeric|min:1',
            'nombreBalcon'=>'required|numeric',
            'dimension'=>'required|numeric|min:10',
            'nombreChambre'=>'required|numeric'
        ]);
        $article = Article::find($request->id);
        $nmbre=$article->nombreChambre;
        $this->authorize('update', $article);
        $article->nom = $request->nom;
        if ($request->file('image')) {
            if (File::exists(public_path('images/' . $article->image))) {
                File::delete(public_path('images/' . $article->image));
            }
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $article['image'] = $filename;
        }
        $article->description = $request->description;
        $article->localisation = $request->localisation;
        $article->statut = $request->statut;
        $article->user_id = Auth::user()->id;
        $article->categorie = $request->categorie;
        $article->nombreToilette = $request->nombreToilette;
        $article->nombreBalcon = $request->nombreBalcon;
        $article->dimension = $request->dimension;
        $article->nombreChambre = $request->nombreChambre;
        $article->update();
        $bien=$article;
        $ok='ok';
        
        if ($nmbre == $request->nombreChambre) {
            return redirect('/articles/'.$request->id)->with('statut', "Bien Immobilier modifier avec succès");
        }else{
                $chambres=Chambre::all();
                foreach ($chambres as $chambre) {
                if ($chambre->article_id === $article->id) {
                    if (File::exists(public_path('images/' . $chambre->image))) {
                        File::delete(public_path('images/' . $chambre->image));
                    }
                    $chambre->delete();
                    }
            }
            return view('articles.ajouterChambre',compact('bien','ok'));
        }
       
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id ,Article $article)
    {
        $this->authorize('delete', $article);
        $article = Article::findOrfail($id);
        $article->delete();
        return redirect('/articles/listearticles')->with('status', 'Article supprimé avec succès');
    }
}