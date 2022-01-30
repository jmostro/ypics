<?php

use Illuminate\Support\Facades\Route;
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





Route::get('/', function (){return view('welcome');})->name('welcome');
Route::get('about', function (){return view('about');})->name('about');
Route::get('albums', [App\Http\Controllers\AlbumController::class,'index'])->name('albums.index');
Route::get('albums/{album}', [App\Http\Controllers\AlbumController::class,'show'])->name('albums.show');
//Route::get('albums/{album}/photo/{photo}', [App\Http\Controllers\PhotoController::class,'show'])->name('photos.show'); // TODO: Should be replaced by a js viewer

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
