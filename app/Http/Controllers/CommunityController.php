<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class CommunityController extends Controller
{
    public function show(){
        /* $usersSuggest = User::all()->random(3)->where('id', '!=', Auth::user()->id); */

        $activities = Activity::all()->sortByDesc('created_at');

        $games = Game::whereIn('id', $activities->pluck('id')->flatten())
            ->get()
            ->mapWithKeys(function ($game) {
                return [$game->id => $game];
            });

        return $games;//->toArray();


        return view('pages.community', compact(/*'usersSuggest' , */'activities', 'games'));
    }
}
