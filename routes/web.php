<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\Album\AlbumSongController;
use App\Http\Controllers\Song\SongAlbumController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/album/{album_id}/song', [AlbumSongController::class, 'store'])->middleware(['auth'])->name('albumsong.store');
Route::delete('/album/{album_id}/song/{song_id}', [AlbumSongController::class, 'destroy'])->middleware(['auth'])->name('albumsong.destroy');

Route::post('/song/{song_id}/album', [SongAlbumController::class, 'store'])->middleware(['auth'])->name('songalbum.store');
Route::delete('/song/{song_id}/album/{album_id}', [SongAlbumController::class, 'destroy'])->middleware(['auth'])->name('songalbum.destroy');

Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/create', [SongController::class, 'create'])->middleware(['auth'])->name('songs.create');
Route::post('/songs', [SongController::class, 'store'])->middleware(['auth'])->name('songs.store');
Route::get('/songs/{song}', [SongController::class, 'show'])->name('songs.show');
Route::get('/songs/{song}/edit', [SongController::class, 'edit'])->middleware(['auth'])->name('songs.edit');
Route::patch('/songs/{song}', [SongController::class, 'update'])->middleware(['auth'])->name('songs.update');
Route::delete('/songs/{song}', [SongController::class, 'destroy'])->middleware(['auth'])->name('songs.destroy');

Route::get('/bands', [BandController::class, 'index'])->name('bands.index');
Route::get('/bands/create', [BandController::class, 'create'])->middleware(['auth'])->name('bands.create');
Route::post('/bands', [BandController::class, 'store'])->middleware(['auth'])->name('bands.store');
Route::get('/bands/{band}', [BandController::class, 'show'])->name('bands.show');
Route::get('/bands/{band}/edit', [BandController::class, 'edit'])->middleware(['auth'])->name('bands.edit');
Route::patch('/bands/{band}', [BandController::class, 'update'])->middleware(['auth'])->name('bands.update');
Route::delete('/bands/{band}', [BandController::class, 'destroy'])->middleware(['auth'])->name('bands.destroy');

Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/create', [AlbumController::class, 'create'])->middleware(['auth'])->name('albums.create');
Route::post('/albums', [AlbumController::class, 'store'])->middleware(['auth'])->name('albums.store');
Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');
Route::get('/albums/{album}/edit', [AlbumController::class, 'edit'])->middleware(['auth'])->name('albums.edit');
Route::patch('/albums/{album}', [AlbumController::class, 'update'])->middleware(['auth'])->name('albums.update');
Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->middleware(['auth'])->name('albums.destroy');
