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
        /* $currentGamesList = User::with('games')
        ->where('id', Auth::user()->id)
        //->wherePivot('relation', 'en cours')
        ->get(); */

        $currentGamesList = User::with(['games' => function ($query){
            $query->wherePivot('relation', 'en cours');
        }])
        ->where('id', Auth::user()->id)
        ->get();

        $finishGamesList = User::with(['games' => function ($query){
            $query->wherePivot('relation', 'termine');
        }])
        ->where('id', Auth::user()->id)
        ->get();

        $wishGamesList = User::with(['games' => function ($query){
            $query->wherePivot('relation', 'envie');
        }])
        ->where('id', Auth::user()->id)
        ->get();

        return view('pages.activity', compact('currentGamesList', 'finishGamesList', 'wishGamesList'));
    }
}
