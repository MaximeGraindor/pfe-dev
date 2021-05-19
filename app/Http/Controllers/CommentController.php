<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Badge;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use MarcReichel\IGDBLaravel\Models\Game as IGDBGame;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(IGDBGame $game, Request $request)
    {
        return $currentGame = IGDBGame::select([
            'name',
            'slug',
            'cover',
            'summary',
            'first_release_date',
            'game_modes',
            'genres',
            'involved_companies',
            'multiplayer_modes',
            'platforms',
            'screenshots',
            'websites',
            'game_modes'])
        ->where('slug', collect(request()->segments())->last())
        ->with(['platforms', 'cover', 'screenshots', 'websites', 'involved_companies.company' => ['id', 'name'], 'game_modes', 'genres'])
        ->first();
        //Vérifie si un commentaire existe déja
        if(!Comment::where('user_Id', Auth::user()->id)->exists()){
            //Si pas de commentaire, on ajoute un badge à l'utilisateur de
            $currentUser = User::where('id', Auth::user()->id)->first();
            $currentUser->badges()->attach(Badge::where('name', 'Premier commentaire')->get());
        }
        $book = Comment::create([
            'user_id' => Auth::user()->id,
            'game_id' => $request->gameId,
            'content' => $request->commentContent,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
