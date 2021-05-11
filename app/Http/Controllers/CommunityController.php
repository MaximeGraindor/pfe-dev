<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function show(){
        $usersSuggest = User::all()->random(3)->where('id', '!=', Auth::user()->id);
        return view('pages.community', compact('usersSuggest'));
    }
}
