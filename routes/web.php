<?php

use App\Models\GameUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\GameUserController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowersController;

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
Route::get('/calendrier', [CalendarController::class, 'index'])->name('calendar');
Route::get('/communaute', [CommunityController::class, 'show'])->name('community');
Route::get('/profil', [UserController::class, 'show'])->name('profil');

Route::get('/profil/{user:pseudo}', [UserController::class, 'show'])->name('profil');
Route::get('/profil/{user:pseudo}/abonnes', [FollowsController::class, 'showFollowers'])->name('followers');
Route::get('/profil/{user:pseudo}/abonnements', [FollowsController::class, 'showFollowings'])->name('followers');

Route::post('/profil/{user:pseudo}/follow', [FollowsController::class, 'store']);
Route::get('/utilisateurs', [UserController::class, 'index'])->name('users');
Route::get('/profil/modifier', [UserController::class, 'edit'])->name('profil.edit');

Route::post('/comments', [CommentController::class, 'store'])->name('comment.store');


Route::get('/admin/ajouter-jeu', [GameController::class, 'create'])
    ->middleware('can:add-game')
    ->name('game.create');

Route::post('/admin/ajouter-jeu/store', [GameController::class, 'store'])
    ->middleware('can:add-game')
    ->name('game.create');



Route::post('/game/addToCurrent/{game:slug}', [GameController::class, 'addToCurrent'])->name('game.addToCurrent');
Route::post('/game/addToFinish/{game:slug}', [GameController::class, 'addToFinish'])->name('game.addToFinish');
Route::post('/game/addToWish/{game:slug}', [GameController::class, 'addToWish'])->name('game.addToWish');



Route::get('/jeu/{game}', [GameController::class, 'show']);
