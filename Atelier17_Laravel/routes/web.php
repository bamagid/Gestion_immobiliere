<?php

use App\Http\Controllers\ArticleController;
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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/article/modifier/{id}',[ArticleController::class,'edit']);
    Route::post('/articles/modifierArticle/{id}',[ArticleController::class,'update']);
    
    // Ajouter Bien
    Route::get('/newarticle', [ArticleController::class, 'create']);
    Route::post('/addarticle', [ArticleController::class, 'store']);
    // Supprimer Bien 
    Route::get('/articles/deletearticle/{id}', [ArticleController::class, 'destroy']);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

