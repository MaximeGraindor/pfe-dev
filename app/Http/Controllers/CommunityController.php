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
        $followers = Auth::user()->followings()->with('activities')->first();
        return $followers;

        /* $user = User::with('activities')->where('pseudo', 'ZeDOver')->first();
        return $user->activities[0]->properties; */

        //return $activity = Activity::all();

        return view('pages.community', compact('usersSuggest'));
    }
}
