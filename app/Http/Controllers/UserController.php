<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('games','badges');
        if(request('pseudo')){
            $users->where('pseudo','like', '%'.request('pseudo').'%');
        }

        foreach ($users as $user) {
            $user->following_count = $user->followings->count();
            $user->followers_count = $user->followers->count();
        }

        $users = $users->get();

        return view('pages.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $user->load('badges');

        $currentGamesList = User::with(['games' => function ($query){
            $query->wherePivot('relation', 'en cours');
        }])
        ->where('id', $user->id)
        ->get();

        $finishGamesList = User::with(['games' => function ($query){
            $query->wherePivot('relation', 'termine');
        }])
        ->where('id', $user->id)
        ->get();

        $wishGamesList = User::with(['games' => function ($query){
            $query->wherePivot('relation', 'envie');
        }])
        ->where('id', $user->id)
        ->get();

        //return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();

        return view('pages.profil', compact('user', 'currentGamesList', 'finishGamesList', 'wishGamesList'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.updateProfil', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $validated = $request->validate([
            'pseudo' => 'unique:users|max:10',
            'picture' => 'required',
            'email' => 'email'
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->update([
            'pseudo' => $request->pseudo
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }
}
