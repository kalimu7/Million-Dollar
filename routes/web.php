<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
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

Route::get('/',[PagesController::class,'body']);
Route::get('/main',[PagesController::class,'body']);
Route::get('/footer',[ PagesController::class,'footer']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');

    })->name('dashboard');
    Route::get('/Posts',[PagesController::class,'post']);
    Route::get('/add',[PagesController::class,'addpost']);
    Route::post('/ajoute',[PagesController::class,'ADD']);
    Route::get('/display',[PagesController::class,'fetchdata']);
    
});
