<?php

namespace App\Http\Controllers;

use follow;
use App\Models\User;
use App\Notifications\UserFollowed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    public function store(User $user){

        if(Auth::user()->isFollowing($user)){
            Auth::user()->unfollow($user);
        }else{
            Auth::user()->follow($user);
            $user->notify(new UserFollowed(Auth::user()));
        }

        return back();
    }

    public function follows(Request $request)
    {

        if($request->route()->named('following')){
            $currentUser = User::where('pseudo', request()->segments()[1])->first();
            $followings = $currentUser->followings()->get();
            return view('pages.users', [
                'currentUser' => $currentUser,
                'title' => 'abonnements',
                'users' => $followings,
                'request' => $request
            ]);
        }

        if($request->route()->named('followers')){
            $currentUser = User::where('pseudo', request()->segments()[1])->first();
            $followers = $currentUser->followers()->get();
            return view('pages.users', [
                'currentUser' => $currentUser,
                'title' => 'abonnés',
                'users' => $followers,
                'request' => $request
            ]);
        }

    }
}
