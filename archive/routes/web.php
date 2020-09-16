<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LockerController;
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

Route::get('/', [MainController::class, 'home'])->name('home');
Route::resource('lockers', LockerController::class);
Route::resource('cells', \App\Http\Controllers\CellController::class);
Route::resource('folders', \App\Http\Controllers\FolderController::class);
Route::resource('folders.files', \App\Http\Controllers\FileController::class)->shallow();

Route::get('api/cells/{id}', [\App\Http\Controllers\CellController::class, 'cellsByLocker']); // For ajax


// Search

Route::post('lockers/search', [LockerController::class, 'search'])->name('lockers.search');
Route::post('cells/search', [\App\Http\Controllers\CellController::class, 'search'])->name('cells.search');
Route::post('folders/files/search', [\App\Http\Controllers\FileController::class, 'search'])->name('folders.files.search');
Route::post('folders/search', [\App\Http\Controllers\FolderController::class, 'search'])->name('folders.search');
