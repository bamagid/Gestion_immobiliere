<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Chambre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ChambreController extends Controller
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
       
        for ($i = 0; $i <count($request->chambres); $i++) {
            $chambre = new Chambre();
            $chambre->dimension = $request->chambres[$i]['dimension'];
            if ($request->hasFile('chambres.' . $i . '.image')) {
                $file = $request->file('chambres.' . $i . '.image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('Chambres'), $filename);
                $chambre->image = $filename;
            }
            $chambre->typeChambre = $request->chambres[$i]['statut'];
            $chambre->article_id = $request->article_id;
            if(!$chambre->save()){
                $article=Article::find($request->article_id);
                if (File::exists(public_path('images/' . $article->image))) {
                File::delete(public_path('images/' . $article->image));
                $article->delete();
            }
            return back()->with('status', "L'ajout des informations suplementaire du bien a echouer veuillez reessayer svp");

            };
        }
    
            $articles = Article::paginate(6);
            return view('articles.myposts', ['articles' => $articles]);
        
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Chambre $chambre)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chambre $chambre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chambre $chambre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chambre $chambre)
    {
        //
    }
}
