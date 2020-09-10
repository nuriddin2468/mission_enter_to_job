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

// Lockers
Route::get('lockers/', [LockerController::class, 'index'])->name('lockers');
Route::get('lockers/create', [LockerController::class, 'create_form'])->name('lockersCreate');
Route::post('lockers/create', [LockerController::class, 'create_req'])->name('lockersCreateReq');

Route::get('cells/', [LockerController::class, 'index'])->name('cells');
Route::get('folders/', [LockerController::class, 'index'])->name('folders');
Route::get('files/', [LockerController::class, 'index'])->name('files');
