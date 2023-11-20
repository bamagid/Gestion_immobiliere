<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/{id}',[ArticleController::class,'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/article/modifier/{id}',[ArticleController::class,'edit']);
    Route::post('/articles/modifierArticle/{id}',[ArticleController::class,'update']);

    Route::get('/newarticle', [ArticleController::class, 'create']);
    Route::post('/addarticle', [ArticleController::class, 'store']);

    Route::post('/commenter',[CommentaireController::class,'store']);
    Route::get('/commenter/{id}',[CommentaireController::class,'edit']);
    Route::post('/commenter/update',[CommentaireController::class,'update']);
    Route::post('/commenter/delete',[CommentaireController::class,'delete']);
    
    Route::delete('/deletearticle/{id}', [Article_controller::class, 'destroy']);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

