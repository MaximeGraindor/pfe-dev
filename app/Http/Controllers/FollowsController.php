<?php

namespace App\Http\Controllers;

use follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    public function store(User $user){

        if(Auth::user()->isFollowing($user)){
            Auth::user()->unfollow($user);
        }else{
            Auth::user()->follow($user);
        }

        return back();
    }
}
