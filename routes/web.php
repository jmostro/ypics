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




Auth::routes(['register' => false, 'reset' => false]);
Route::get('/', function (){return view('welcome');})->name('welcome');
Route::get('about', function (){return view('about');})->name('about');
Route::get('albums', [App\Http\Controllers\PortfolioController::class,'indexAlbums'])->name('albums.index');
Route::get('albums/{album}', [App\Http\Controllers\PortfolioController::class,'showAlbum'])->name('albums.show');
Route::get('admin', [App\Http\Controllers\Admin\AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('admin/albums', [App\Http\Controllers\Admin\AdminController::class,'albums'])->name('admin.albums.index');
Route::get('admin/album/{album}', [App\Http\Controllers\Admin\AdminController::class,'showAlbum'])->name('admin.albums.show');
Route::get('admin/album/{album}/edit', [App\Http\Controllers\Admin\AdminController::class,'editAlbum'])->name('admin.albums.edit');
Route::put('admin/album/{album}/update', [App\Http\Controllers\Admin\AdminController::class,'updateAlbum'])->name('admin.albums.update');
Route::get('admin/album/{album}/delete', [App\Http\Controllers\Admin\AdminController::class,'deleteAlbum'])->name('admin.albums.delete');
Route::get('admin/album/{album}/remove/{photo}', [App\Http\Controllers\Admin\AdminController::class,'removePhotoFromAlbum'])->name('admin.album.removephoto');
Route::get('admin/photos',[App\Http\Controllers\Admin\AdminController::class,'photos'])->name('admin.photos.index');
Route::get('admin/photos/{photo}/edit',[App\Http\Controllers\Admin\AdminController::class,'editPhoto'])->name('admin.photos.edit');
Route::put('admin/photos/{photo}/update',[App\Http\Controllers\Admin\AdminController::class,'updatePhoto'])->name('admin.photos.update');
Route::get('admin/photos/{photo}/delete',[App\Http\Controllers\Admin\AdminController::class,'deletePhoto'])->name('admin.photos.delete');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
