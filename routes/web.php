<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'admin'])->name('admin.dashboard');

Route::resource('films', FilmController::class)->middleware(['auth', 'admin']);
Route::resource('genres', GenreController::class)->middleware(['auth', 'admin']);
Route::resource('reviews', ReviewController::class)->middleware(['auth']);
Route::resource('watchlists', WatchlistController::class)->middleware(['auth'])->only(['index', 'create', 'store', 'destroy']);

require __DIR__ . '/auth.php';