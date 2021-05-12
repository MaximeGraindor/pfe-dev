<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowingController extends Controller
{
    public function show(){
        return Auth::user()->following()->get();
    }
}
