<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $lastRelease = Game::whereBetween('release_date',array(Carbon::now()->subMonth(10), Carbon::now()))
                        ->orderBy('release_date', 'DESC')
                        ->take(5)
                        ->get();
        return view('home', compact('lastRelease'));
    }
}
