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

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = DB::table('games')
            ->whereMonth('release_date', Carbon::now()->month)
            ->whereYear('release_date', Carbon::now()->year)
            ->get();
        $modes = Mode::all();
        $supports = Support::all();
        return view('pages.calendar', compact('games', 'modes', 'supports'));
    }
}
