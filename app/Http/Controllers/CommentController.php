<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Mode;
use App\Models\User;
use App\Models\Badge;
use App\Models\Genre;

use App\Models\Comment;
use App\Models\Publisher;
use App\Models\Plateforme;
use App\Models\Screenshot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $currentGame = IGDBGame::select([
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
        ->where('slug', collect(request()->segments())->first())
        ->with(['platforms', 'cover', 'screenshots', 'websites', 'involved_companies.company' => ['id', 'name'], 'game_modes', 'genres'])
        ->first();

        if(!(Game::where('slug', $currentGame->slug))->exists()){
            // Ajoute un nouveau jeu
            $gameToSave = new Game();
            $gameToSave->name = $currentGame->name;
            $gameToSave->slug = $currentGame->slug;
            $gameToSave->description = $currentGame->summary;
            $gameToSave->cover_path = $currentGame->cover ? $currentGame->cover->image_id . '.jpg' : 'game-cover-default.jpg';
            $gameToSave->banner_path = $currentGame->screenshots ? $currentGame->screenshots[0]->image_id . '.jpg' : null;
            $gameToSave->release_date = $currentGame->first_release_date;
            $gameToSave->save();

            if($currentGame->involved_companies){
                foreach($currentGame->involved_companies as $key => $involved_company) {
                    $publisher = new Publisher();
                    $publisher->name = $involved_company->company->name;
                    $publisher->save();
                    $gameToSave->publishers()->attach($publisher->id);
                }
            }

            if($currentGame->game_modes){
                foreach($currentGame->game_modes as $key => $gameMode) {
                    $mode = new Mode();
                    $mode->name = $gameMode->name;
                    $mode->save();
                    $gameToSave->modes()->attach($mode->id);
                }
            }


            if($currentGame->genres){
                foreach($currentGame->genres as $key => $gameGenre) {
                    $genres = new Genre();
                    $genres->name = $gameGenre->name;
                    $genres->save();
                    $gameToSave->genres()->attach($genres->id);
                }
            }


            if($currentGame->platforms){
                foreach($currentGame->platforms as $key => $gamePlatform) {
                    $platform = new Plateforme();
                    $platform->name = $gamePlatform->abbreviation;
                    $platform->save();
                    $gameToSave->plateformes()->attach($platform->id);
                }
            }

            if($currentGame->screenshots){
                foreach($currentGame->screenshots as $key => $gameScreenshot) {
                    //return $gameScreenshot->image_id;
                    $urlScreenshot = "https://images.igdb.com/igdb/image/upload/t_cover_big/". $gameScreenshot->image_id . ".jpg";
                    $contentsScreenshot = file_get_contents($urlScreenshot);
                    $name = substr($urlScreenshot, strrpos($urlScreenshot, '/') + 1);
                    Storage::put('/public/games/screenshots/'.$name, $contentsScreenshot);

                    $screenshot = new Screenshot();
                    $screenshot->name = $gameScreenshot->image_id;
                    $screenshot->save();
                    $gameToSave->screenshots()->attach($screenshot->id);
                }
            }

            //Enregistre les images sur le disque
            //La cover
            $urlCover = "https://images.igdb.com/igdb/image/upload/t_cover_big/". ($currentGame->cover ? $currentGame->cover->image_id : 'game-cover-default') . ".jpg";
            $contentsCover = file_get_contents($urlCover);
            $name = substr($urlCover, strrpos($urlCover, '/') + 1);
            Storage::put('/public/games/cover/'.$name, $contentsCover);

            // La bannière
            $urlBanner = "https://images.igdb.com/igdb/image/upload/t_screenshot_big/". ($currentGame->screenshots ? $currentGame->screenshots[0]->image_id : 'game-cover-default') . ".jpg";
            $contentsBanner = file_get_contents($urlBanner);
            $name = substr($urlBanner, strrpos($urlBanner, '/') + 1);
            Storage::put('/public/games/banner/'.$name, $contentsBanner);

            /////////////////////////////////////////////////////////////////

            // Badge
            $badge = Badge::where('slug', 'premier-commentaire')->first();

            if(!Comment::where('user_id', Auth::user()->id)->exists()){
                //Si pas de jeu, on ajoute un badge à l'utilisateur de
                $currentUser = User::where('id', Auth::user()->id)->first();
                $currentUser->badges()->attach($badge->id);

                activity()
                ->performedOn(Badge::where('slug', 'premier-commentaire')->first())
                ->causedBy(Auth::user()->id)
                ->withProperties([
                    'name' => $badge->name,
                    'img' => $badge->img,
                    'description' => $badge->description,
                    'badge_id' => $badge->id
                ])
                ->log('Badge gagné');
            }



            $comment = Comment::create([
                'user_id' => Auth::user()->id,
                'game_id' => $gameToSave->id,
                'content' => $request->commentContent,
            ]);

            activity()
                ->performedOn($comment)
                ->causedBy(Auth::user()->id)
                ->withProperties([
                    'content' => $comment->content,
                    'game_id' => $comment->game_id,
                    'user_id' => $comment->user_id,
                ])
                ->log('Commentaire écrit');



        }else{
            $currentGame = Game::where('slug', collect(request()->segments())->first())->first();

            if(!Comment::where('user_id', Auth::user()->id)->exists()){
                //Si pas de jeu, on ajoute un badge à l'utilisateur de
                $currentUser = User::where('id', Auth::user()->id)->first();
                $currentUser->badges()->attach(Badge::where('slug', 'premier-commentaire')->get());
            }

            $comment = Comment::create([
                'user_id' => Auth::user()->id,
                'game_id' => $currentGame->id,
                'content' => $request->commentContent,
            ]);

            activity()
                ->performedOn($comment)
                ->causedBy(Auth::user()->id)
                ->withProperties([
                    'content' => $comment->content,
                    'game_id' => $comment->game_id,
                    'user_id' => $comment->user_id,
                ])
                ->log('Commentaire écrit');

        }

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
