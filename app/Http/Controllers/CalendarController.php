<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\Publisher;
use Illuminate\Http\Request;
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
        $publishers = Publisher::all();
        $supports = Support::all();
        return view('pages.calendar', compact('publishers', 'supports'));
    }
}
