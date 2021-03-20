<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/parcourir', [GameController::class, 'index'])->name('browse');
Route::get('/profil', [UserController::class, 'show'])->name('profil');
Route::get('/profil/modifier', [UserController::class, 'edit'])->name('profil.edit');

Route::post('/comments', [CommentController::class, 'store'])->name('comment.store');


Route::post('/game/addToCurrent/{game}', [GameController::class, 'addToCurrent'])->name('game.addToCurrent');
Route::post('/game/addToFinish/{game}', [GameController::class, 'addToFinish'])->name('game.addToFinish');
Route::post('/game/addToWish/{game}', [GameController::class, 'addToWish'])->name('game.addToWish');



Route::get('/jeu/{game}', [GameController::class, 'show']);
