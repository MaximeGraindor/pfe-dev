<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class LikeController extends Controller
{
    public function store(Request $request, Activity $activity)
    {

        Auth::user()->toggleLike($activity);

        return back();
    }
}
