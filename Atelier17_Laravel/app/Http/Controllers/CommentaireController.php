<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
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
        $comments->admin_id=$request->admin_id;
        $comments->is_delete=false;
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
    public function edit(Request $request)
    {
        $commentaire=Commentaire::findOrFail($request->id);
        return redirect('/article'.$request->article_id);
        
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
        $comments->admin_id=$request->admin_id;
        $comments->is_delete=false;
        if ($comments->save()) {
           return redirect('/')->with('status','Bravo le commentaire est ajouté!');
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
