<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\CategorieController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('utilisateurs', UtilisateurController::class);
Route::resource('formateurs', FormateurController::class);
Route::resource('documents', DocumentController::class);
Route::resource('ressources', RessourceController::class);
Route::resource('categories', CategorieController::class);
