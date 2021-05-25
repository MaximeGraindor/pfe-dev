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

        $result = $users->get()->map(function ($query) {
            $query->setRelation('games', $query->games->take(5));
            return $query;
        });

        return view('pages.users', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return view('pages.updateProfil');
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
        //
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
}
