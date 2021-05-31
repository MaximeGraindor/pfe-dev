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
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReplyController;

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


Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/parcourir', [GameController::class, 'index'])
        ->name('browse');

    Route::get('/jeu/{game}', [GameController::class, 'show']);
    Route::post('/jeu/{game}/rating', [GameController::class, 'rating']);

    Route::get('/calendrier', [CalendarController::class, 'index'])
        ->name('calendar');

    Route::get('/communaute', [CommunityController::class, 'show'])
        ->name('community');

    Route::post('/activity/{activity:id}/like', [LikeController::class, 'store'])
        ->name('activity.like');

    Route::post('/communaute/{activity:id}/reply', [ReplyController::class, 'store'])
        ->name('reply.store');

    Route::post('/reply/{reply:id}/reply', [ReplyController::class, 'replyToReply'])
        ->name('reply.store');



    Route::get('/profil', [UserController::class, 'show'])
        ->name('profil');

    Route::get('/profil/edit', [UserController::class, 'edit'])
        ->name('user.profil-edit');

    Route::post('/profil/update', [UserController::class, 'update'])
        ->name('user.profil-update');

    Route::get('/profil/{user:pseudo}', [UserController::class, 'show'])
        ->name('profil.show');
    Route::post('/profil/{user:pseudo}/follow', [FollowsController::class, 'store'])
        ->name('user.follow');



    Route::get('/profil/{user:pseudo}/abonnes', [FollowsController::class, 'follows'])
        ->name('followers');
    Route::get('/profil/{user:pseudo}/abonnements', [FollowsController::class, 'follows'])
        ->name('following');




    Route::get('/utilisateurs', [UserController::class, 'index'])->name('users');
    Route::get('/profil/modifier', [UserController::class, 'edit'])->name('profil.edit');

    Route::post('/{game:slug}/comments', [CommentController::class, 'store'])->name('comment.store');

    Route::post('/game/addToCurrent/{game:slug}', [GameController::class, 'addToCurrent'])->name('game.addToCurrent');
    Route::post('/game/addToFinish/{game:slug}', [GameController::class, 'addToFinish'])->name('game.addToFinish');
    Route::post('/game/addToWish/{game:slug}', [GameController::class, 'addToWish'])->name('game.addToWish');

    Route::post('/gameuser/{game:slug}/delete', [GameUserController::class, 'destroy'])->name('game-user.destroy');



});






