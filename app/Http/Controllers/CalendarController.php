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
use MarcReichel\IGDBLaravel\Models\Game as IGDB_API_Game;
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
        $games = IGDB_API_Game::with(['platforms', 'cover'])
                ->search($request->name ? $request->name : '')
                ->orderBy('first_release_date', 'desc')
                ->paginate();

        return view('pages.calendar', compact('games'));
    }
}
