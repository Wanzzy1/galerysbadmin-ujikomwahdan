<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
route::get('/login',[SessionController::class,'index'])->middleware('guest')->name('login');
route::post('/sesi/login',[AuthController::class,'_login']);
route::get('/logout',[SessionController::class,'logout'])->middleware('auth');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//Photo
route::get('/detail/album/{id}', [PhotoController::class, 'index'])->name('Photo.index');
route::post('/Photo', [PhotoController::class, 'store'])->name('Photo.store');
Route::delete('/photos/{id}', [PhotoController::class, 'delete'])->name('delete_photo');
Route::post('/photos/{photo}/comments', [KomentarController::class, 'store'])->name('komentar.store');

//Album
route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');

Route::get('/album/new', [AlbumController::class, 'create']);
Route::post('/album/new_', [AlbumController::class, 'store']);

Route::get('/album/delete/{id}', [AlbumController::class, 'destroy']);
