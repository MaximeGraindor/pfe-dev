<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GameUser;
use Illuminate\Http\Request;
use App\Events\FollowsNotification;
use Illuminate\Support\Facades\Auth;
use MarcReichel\IGDBLaravel\Models\Game as IGDBModelGame;

class DashboardController extends Controller
{
    public function index()
    {

        $currentGamesList = User::with(['games' => function ($query){
            $query->wherePivot('relation', 'en cours');
        }])
        ->where('id', Auth::user()->id)
        ->first();

        $finishGamesList = User::with(['games' => function ($query){
            $query->wherePivot('relation', 'termine');
        }])
        ->where('id', Auth::user()->id)
        ->first();

        $wishGamesList = User::with(['games' => function ($query){
            $query->wherePivot('relation', 'envie');
        }])
        ->where('id', Auth::user()->id)
        ->first();

        $suggestGames = IGDBModelGame::select(['name', 'slug', 'cover'])
            ->with(['cover'])
            ->where('slug', 'cyberpunk-2077')
            ->orWhere('slug', 'watch-dogs-legion')
            ->orWhere('slug', 'dying-light-2')
            ->get();


        //event(new FollowsNotification('hello world'));

        return view('pages.activity', compact('currentGamesList', 'finishGamesList', 'wishGamesList', 'suggestGames'));
    }
}
