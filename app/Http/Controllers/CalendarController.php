<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Game;
use App\Models\Mode;
use App\Models\Support;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use MarcReichel\IGDBLaravel\Models\Game as IGDBGame;
use MarcReichel\IGDBLaravel\Builder as IGDB;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $games = IGDBGame::with(['platforms', 'cover']);
        if($request->year){
            $games->whereYear('first_release_date', '=', $request->year)->get();
        }else{
            $games->whereYear('first_release_date', '=', Carbon::now()->year);
        };

        $games = $games
            ->OrderBy('first_release_date', 'asc')
            ->paginate(100);

        return view('pages.calendar', compact('games'));
    }
}
