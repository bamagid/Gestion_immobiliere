<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $comments= new Commentaire();
        $comments->article_id=$request->article_id;
        $comments->contenu=$request->contenu;
        $comments->user_id=Auth::user()->id;
        if ($comments->save()) {
           return redirect('/')->with('status','Bravo le commentaire est ajouté!');
        }else{
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Commentaire $commentaire)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $ok='ok';
        $commentaire=Commentaire::findorFail($id);
        $article=Article::find($commentaire->article_id);
        return view('articles.voirplus',compact('commentaire','article','ok'));
        return redirect('/articles/'.$commentaire->article_id);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $comments=Commentaire::findOrFail($request->id);
        $comments->article_id=$request->article_id;
        $comments->contenu=$request->contenu;
        $comments->user_id=Auth::user()->id;
        if ($comments->save()) {
           return redirect('/articles/'.$request->article_id)->with('status','Bravo le commentaire est modifié avec succes!');
        }else{
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $commentaire=Commentaire::findOrFail($id);
        $commentaire->delete();
        return back();
    }
}
