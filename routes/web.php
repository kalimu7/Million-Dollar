<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CommentController;
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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
            
        })->name('dashboard');
    Route::get('/',[PagesController::class,'body']);
    Route::get('/Posts',[PagesController::class,'fetchdata']);
    Route::get('/add',[PagesController::class,'addpost']);
    Route::post('/ajoute',[PagesController::class,'ADD']);
    Route::get('/display',[PagesController::class,'fetchdata']);
    Route::get('/edit/{id}',[PagesController::class,'edit']);
    Route::post('/update/{id}',[PagesController::class,'update']);
    Route::get('/delete/{id}',[PagesController::class,'destroy']);
    Route::get('/show/{id}',[PagesController::class,'Dsingle']);
    Route::post('/Addcomment',[CommentController::class,'Add']);
    Route::get('/display/{idpost}',[CommentController::class,'DsingleWithComment']);
    Route::post('/likeit',[CommentController::class,'Like']);
    Route::get('/categories',[PagesController::class,'category']);
    Route::get('/category/{z}',[PagesController::class,'fetchcategory']);
    
    
});
