<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GameUser;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $wish = User::with('games')->get();
        return $wish;
        return view('pages.activity');
    }
}
