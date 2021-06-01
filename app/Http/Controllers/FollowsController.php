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
            //$user->notify(new UserFollowed(Auth::user()));
            $user->notify(new UserFollowed('Hello World'));
        }

        return back();
    }

    /* public function showFollowers(User $user){
        return Auth::user()->followers()->get();
    }

    public function showFollowings(User $user){
        return Auth::user()->followings()->get();
    } */

    public function follows(Request $request)
    {

        if($request->route()->named('following')){
            $currentUser = User::where('pseudo', request()->segments()[1])->get();
            return $currentUser->followings()->get();
        }

        if($request->route()->named('followers')){
            $currentUser = User::where('pseudo', request()->segments()[1])->get();
            return $currentUser->followers()->get();
        }

    }

    /**
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        return 'App.Models.User.'.$this->id;
    }
}
