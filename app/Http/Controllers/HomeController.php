<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Http\Request;
use MarcReichel\IGDBLaravel\Models\Game as ModelsGame;

class HomeController extends Controller
{
    public function index()
    {
        $games = ModelsGame::with(['cover'])
                    ->take(5)->get();

        $lastReleases = ModelsGame::with(['cover'])
        ->take(5)
        ->whereYear('first_release_date', '=', Carbon::now()->year)
        ->get();
        return view('home', compact('games', 'lastReleases'));
    }
}
