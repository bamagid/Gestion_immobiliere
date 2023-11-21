<?php

use App\Http\Controllers\ArticleController;
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


Route::get('/', [ArticleController::class, 'index']);

Route::get('/articles/{id}',[ArticleController::class,'show']);



Route::middleware('auth')->group(function () {
    Route::get('/dashbord',[ArticleController::class,'shows']);

    Route::get('/article/modifier/{id}',[ArticleController::class,'edit']);
    Route::post('/articles/modifierArticle/{id}',[ArticleController::class,'update']);
    
    // Ajouter Bien
    Route::get('/newarticle', [ArticleController::class, 'create']);
    Route::post('/addarticle', [ArticleController::class, 'store']);

    Route::delete('/deletearticle/{id}', [Article_controller::class, 'destroy']);

    Route::post('/commentaire', [CommentaireController::class, 'store']);
    Route::get('/articles/commentaire/{id}', [CommentaireController::class, 'edit']);
    Route::post('/articles/commentaireupdate/{id}', [CommentaireController::class, 'update']);
    Route::get('/articles/deletecommentaire/{id}', [CommentaireController::class, 'destroy']);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

