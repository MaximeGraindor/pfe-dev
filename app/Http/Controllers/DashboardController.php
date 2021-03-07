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
        $wish = User::with('games')
        ->where('id', Auth::user()->id)
        ->get();
        //return $wish;
        return view('pages.activity', compact('wish'));
    }
}
