<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GameUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $currentGamesList = User::with('games')
        ->where('id', Auth::user()->id)
        //->wherePivot('relation', 'en cours')
        ->get();
        $finishGamesList = User::with('games')
        ->where('id', Auth::user()->id)
        //->wherePivot('relation', 'termine')
        ->get();
        $wishGamesList = User::with('games')
        ->where('id', Auth::user()->id)
        //->wherePivot('relation', 'envie')
        ->get();
        //return $currentGamesList;
        return view('pages.activity', compact('currentGamesList', 'finishGamesList', 'wishGamesList'));
    }
}
