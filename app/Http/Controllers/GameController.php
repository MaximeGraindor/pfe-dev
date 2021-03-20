<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::with('publisher')->get();
        $publishers = Publisher::all();
        return view('pages.browse', compact('games', 'publishers'));
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
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $game->load('comments');
        return view('pages.game', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }

    /**
     * Add a game to the current list
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function addToCurrent(Game $game)
    {
        $game->users()->attach(Auth::user(), ['relation' => 'en cours']);

        return redirect('/dashboard');
    }

    /**
     * Add a game to the finish list
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function addToFinish(Game $game)
    {
        $game->users()->attach(Auth::user(), ['relation' => 'termine']);

        return redirect('/dashboard');
    }

    /**
     * Add a game to the wish list
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function addToWish(Game $game)
    {
        $game->users()->attach(Auth::user(), ['relation' => 'envie']);

        return redirect('/dashboard');
    }
}
