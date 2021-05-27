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
        $usersSuggest = User::all()->random(3)->where('id', '!=', Auth::user()->id);

        $activities = Activity::with('replies.user')
        ->whereIn('causer_id', Auth::user()->followings->pluck('id'))
        //->sortByDesc('created_at')
        ->get();

        return view('pages.community', compact('usersSuggest', 'activities'));
    }
}
