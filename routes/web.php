<?php

use App\Http\Controllers\MainController;
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

Route::get('/', function () {
    return view('layouts.main');
});


// store image in public storage
Route::get('/public_index', [MainController::class, 'public_index'])->name('public.index');
Route::get('/public_create', [MainController::class, 'public_create'])->name('public.create');
Route::post('/public_store', [MainController::class, 'public_store'])->name('public.store');
Route::get('/public_edit/{item}', [MainController::class, 'public_edit'])->name('public.edit');
Route::put('/public_update/{item}', [MainController::class, 'public_update'])->name('public.update');
Route::delete('/public_delete/{item}', [MainController::class, 'public_delete'])->name('public.delete');

// store image in private
Route::get('/private_index', [MainController::class, 'private_index'])->name('private.index');
Route::get('/private_create', [MainController::class, 'private_create'])->name('private.create');
Route::post('/private_store', [MainController::class, 'private_store'])->name('private.store');
Route::get('/private_show/{item}/image', [MainController::class, 'private_show_image'])->name('private.showImage');
Route::get('/private_edit/{item}', [MainController::class, 'private_edit'])->name('private.edit');
Route::put('/private_update/{item}', [MainController::class, 'private_update'])->name('private.update');
Route::delete('/private_delete/{item}', [MainController::class, 'private_delete'])->name('private.delete');