 



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\Auth;

 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('documents', DocumentController::class);
Route::resource('ressources', RessourceController::class);

// Route::middleware('auth', 'role:Formateur')->group(function () {
//     Route::post('/documents/{document}/approve', [DocumentController::class, 'approve'])->name('documents.approve');
// });


