<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\Support;
use Illuminate\Http\Request;

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
