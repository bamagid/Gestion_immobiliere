<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ProfileController;
use App\Models\Commentaire;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    
});
Route::get('/articles/listearticles', [ArticleController::class, 'index']);

Route::get('/articles/{id}',[ArticleController::class,'shows']);

Route::get('/', function(){
    return view('welcome');
});


Route::middleware('auth')->group(function () {

    Route::get('/profile/update', function(){
        return view('profile.edit');
    });

    Route::get('/admin',[ArticleController::class,'show']);

    Route::post('/chambres/ajouter',[ChambreController::class,'store'])->name('chambres.ajouter');
    Route::get('/chambre/update/{id}',[ChambreController::class,'edit']);
    Route::post('/chambre/{id}/update',[ChambreController::class,'update'])->name( 'chambres.modifier');;
    Route::post('/chambres/supprimer',[ChambreController::class,'delete']);
    
    Route::get('/article/modifier/{id}',[ArticleController::class,'edit']);
    Route::post('/articles/modifierArticle/{id}',[ArticleController::class,'update']);
    
    // Ajouter Bien
    Route::get('/newarticle', [ArticleController::class, 'create']);
    Route::post('/addarticle', [ArticleController::class, 'store']);
    // Supprimer Bien 
    Route::get('/articles/deletearticle/{id}', [ArticleController::class, 'destroy']);

    Route::post('/commentaire', [CommentaireController::class, 'store']);
    Route::get('/articles/commentaire/{id}', [CommentaireController::class, 'edit']);
    Route::post('/articles/commentaireupdate/{id}', [CommentaireController::class, 'update']);
    Route::get('/articles/deletecommentaire/{id}', [CommentaireController::class, 'destroy']);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

