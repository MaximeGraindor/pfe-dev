<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Mode;
use App\Models\User;
use App\Models\Badge;
use App\Models\Genre;
use App\Models\Support;
use App\Models\GameUser;
use App\Models\Publisher;
use App\Models\Plateforme;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use App\Http\Requests\StoreGameRequest;
use App\Models\Screenshot;
use Illuminate\Support\Facades\Storage;
use MarcReichel\IGDBLaravel\Builder as IGDB;
use MarcReichel\IGDBLaravel\Models\Game as IGDBGame;
use MarcReichel\IGDBLaravel\Models\Genre as IGDBGenre;
use MarcReichel\IGDBLaravel\Models\Modes;
use MarcReichel\IGDBLaravel\Models\Platform as IGDBPlatform;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $platforms = IGDBPlatform::all();
        $genres = IGDBGenre::all();

        $games = IGDBGame::with(['platforms', 'cover', 'genres'])->orderBy('aggregated_rating', 'asc');

        if($request->name){
            $games->whereLike('name', '%' . $request->name . '%', false);
        };

        if($request->platforms){
            $games->where('platforms.abbreviation', '$request->platforms');
        };

        $games = $games->paginate(100);
        return view('pages.browse', compact('games', 'platforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishers = Publisher::all();
        $modes = Mode::all();
        $plateformes = Plateforme::all();
        $genres = Genre::all();
        $supports = Support::all();
        return view('admin.addGame', compact('publishers', 'modes', 'plateformes', 'genres', 'supports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* $validated = $request->validated();
        $game = Game::create($request);*/


        $game = new Game();
        $game->name = $request->name;
        $game->slug = Str::slug($request->name, '-');
        $game->description = $request->synopsis;
        $game->cover_path = $request->imgCover;
        $game->banner_path = $request->imgBanner;
        $game->trailer = $request->trailer;
        $game->classification = $request->classification;
        $game->release_date = $request->releaseDate;
        $game->publisher_id = $request->publisher;

        $game->save();

        return redirect('/parcourir');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(IGDBGame $game, Request $request)
    {
        if(!(Game::where('slug', collect(request()->segments())->last()))->exists()){
            $game = IGDBGame::select([
                'name',
                'slug',
                'cover',
                'summary',
                'first_release_date',
                'game_modes', 'genres',
                'involved_companies',
                'multiplayer_modes',
                'platforms',
                'screenshots',
                'websites',
                'game_modes'])
            ->where('slug', collect(request()->segments())->last())
            ->with(['platforms', 'cover', 'screenshots', 'websites', 'involved_companies.company' => ['id', 'name'], 'game_modes'])
            ->first();
            return view('pages.game.gameAPI', compact('game'));
        }else{
             $game = Game::where('slug', collect(request()->segments())->last())
                ->with('comments', 'screenshots', 'plateformes', 'modes', 'publishers', 'genres')
                ->first();
            return view('pages.game.gameLocal', compact('game'));
        }


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
    public function addToCurrent(IGDBGame $game)
    {
        // On récupere le jeu sélectionné
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
        ->where('slug', collect(request()->segments())->last())
        ->with(['platforms', 'cover', 'screenshots', 'websites', 'involved_companies.company' => ['id', 'name'], 'game_modes', 'genres'])
        ->first();

        // On vérifie que le jeu n'est pas dans la DB
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

            // Badge
            if(!GameUser::where('user_id', Auth::user()->id)->exists()){
                //Si pas de jeu, on ajoute un badge à l'utilisateur de
                $currentUser = User::where('id', Auth::user()->id)->first();
                $currentUser->badges()->attach(Badge::where('name', 'Premier jeu ajouté')->get());
            }

            // Vérifie si le jeu est déjà présent dans la liste
            if(GameUser::where([['relation', '=', 'en cours'],['game_id', '=', $gameToSave->id], ['user_id', Auth::user()->id]])->exists()){
                toastr()->error('le jeu est déjà présent dans la liste', 'Erreur');
                return redirect()->back();
            };

            // vérifie si le jeu appartient déjà à une autre liste
            if(GameUser::where([['game_id', $gameToSave->id],['user_id', Auth::user()->id]])->exists()){
                $gameToSave->users()->detach();
                $gameToSave->users()->attach(Auth::user(), ['relation' => 'en cours']);
            }else{
                $gameToSave->users()->attach(Auth::user(), ['relation' => 'en cours']);
            };
            toastr()->success('Le jeu a bient été ajouté', 'Succès');
            return redirect()->back();

        }else{

            $currentGame = Game::where('slug', collect(request()->segments())->last())->first();

            if(!GameUser::where('user_id', Auth::user()->id)->exists()){
                //Si pas de jeu, on ajoute un badge à l'utilisateur de
                $currentUser = User::where('id', Auth::user()->id)->first();
                $currentUser->badges()->attach(Badge::where('name', 'Premier jeu ajouté')->get());
            }
            //return Auth::user()->id;
            // Vérifie si le jeu est déjà présent dans la liste
            if(GameUser::where([['relation', '=', 'en cours'],['game_id', '=', $currentGame->id], ['user_id', Auth::user()->id]])->exists()){
                toastr()->error('le jeu est déjà présent dans la liste', 'Erreur');
                return redirect()->back();
            };


            // vérifie si le jeu appartient déjà à une autre liste
            if(GameUser::where([['game_id', $currentGame->id],['user_id', Auth::user()->id]])->exists()){
                $currentGame->users()->detach();
                $currentGame->users()->attach(Auth::user(), ['relation' => 'en cours']);
            }else{
                $currentGame->users()->attach(Auth::user(), ['relation' => 'en cours']);
            };
            toastr()->success('Le jeu a bient été ajouté', 'Succès');
            return redirect()->back();
        }

    }

    /**
     * Add a game to the finish list
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function addToFinish(IGDBGame $game)
    {
        // On récupere le jeu sélectionné
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
        ->where('slug', collect(request()->segments())->last())
        ->with(['platforms', 'cover', 'screenshots', 'websites', 'involved_companies.company' => ['id', 'name'], 'game_modes', 'genres'])
        ->first();

        // On vérifie que le jeu n'est pas dans la DB
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

            // Badge
            if(!GameUser::where('user_id', Auth::user()->id)->exists()){
                //Si pas de jeu, on ajoute un badge à l'utilisateur de
                $currentUser = User::where('id', Auth::user()->id)->first();
                $currentUser->badges()->attach(Badge::where('name', 'Premier jeu ajouté')->first());
            }

            // Vérifie si le jeu est déjà présent dans la liste
            if(GameUser::where([['relation', '=', 'termine'],['game_id', '=', $gameToSave->id], ['user_id', Auth::user()->id]])->exists()){
                toastr()->error('Jeu déjà présent dans la liste', 'Erreur');
                return redirect()->back();
            };

            // vérifie si le jeu appartient déjà à une autre liste
            if(GameUser::where([['game_id', $gameToSave->id],['user_id', Auth::user()->id]])->exists()){
                $gameToSave->users()->detach();
                $gameToSave->users()->attach(Auth::user(), ['relation' => 'termine']);
            }else{
                $gameToSave->users()->attach(Auth::user(), ['relation' => 'termine']);
            };
            toastr()->success('Le jeu a bient été ajouté', 'Succès');
            return redirect()->back();

        }else{
            $currentGame = Game::where('slug', collect(request()->segments())->last())->first();
            if(!GameUser::where('user_id', Auth::user()->id)->exists()){
                //Si pas de jeu, on ajoute un badge à l'utilisateur de
                $currentUser = User::where('id', Auth::user()->id)->first();
                $currentUser->badges()->attach(Badge::where('name', 'Premier jeu ajouté')->get());
            }
            // Vérifie si le jeu est déjà présent dans la liste
            if(GameUser::where([['relation', '=', 'termine'],['game_id', '=', $currentGame->id], ['user_id', Auth::user()->id]])->exists()){
                toastr()->error('Jeu déjà présent dans la liste', 'Erreur');
                return redirect()->back();
            };

            // vérifie si le jeu appartient déjà à une autre liste
            if(GameUser::where([['game_id', $currentGame->id],['user_id', Auth::user()->id]])->exists()){
                $currentGame->users()->detach();
                $currentGame->users()->attach(Auth::user(), ['relation' => 'termine']);
            }else{
                $currentGame->users()->attach(Auth::user(), ['relation' => 'termine']);
            };
            toastr()->success('Le jeu a bient été ajouté', 'Succès');
            return redirect()->back();
        }
    }

    /**
     * Add a game to the wish list
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function addToWish(IGDBGame $game)
    {
        // On récupere le jeu sélectionné
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
        ->where('slug', collect(request()->segments())->last())
        ->with(['platforms', 'cover', 'screenshots', 'websites', 'involved_companies.company' => ['id', 'name'], 'game_modes', 'genres'])
        ->first();

        // On vérifie que le jeu n'est pas dans la DB
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
                    $urlScreenshot = "https://images.igdb.com/igdb/image/upload/t_cover_big/". $gameScreenshot->image_id  . ".jpg";
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

            // Badge
            if(!GameUser::where('user_id', Auth::user()->id)->exists()){
                //Si pas de jeu, on ajoute un badge à l'utilisateur de
                $currentUser = User::where('id', Auth::user()->id)->first();
                $currentUser->badges()->attach(Badge::where('name', 'Premier jeu ajouté')->get());
            }

            // Vérifie si le jeu est déjà présent dans la liste
            if(GameUser::where([['relation', '=', 'envie'],['game_id', '=', $gameToSave->id], ['user_id', Auth::user()->id]])->exists()){
                toastr()->error('Jeu déjà présent dans la liste', 'Erreur');
            };

            // vérifie si le jeu appartient déjà à une autre liste
            if(GameUser::where([['game_id', $gameToSave->id],['user_id', Auth::user()->id]])->exists()){
                $gameToSave->users()->detach();
                $gameToSave->users()->attach(Auth::user(), ['relation' => 'envie']);
            }else{
                $gameToSave->users()->attach(Auth::user(), ['relation' => 'envie']);
            };
            toastr()->success('Le jeu a bient été ajouté', 'Succès');
            return redirect()->back();

        }else{
            $currentGame = Game::where('slug', collect(request()->segments())->last())->first();
            if(!GameUser::where('user_id', Auth::user()->id)->exists()){
                //Si pas de jeu, on ajoute un badge à l'utilisateur de
                $currentUser = User::where('id', Auth::user()->id)->first();
                $currentUser->badges()->attach(Badge::where('name', 'Premier jeu ajouté')->get());
            }
            // Vérifie si le jeu est déjà présent dans la liste
            if(GameUser::where([['relation', '=', 'envie'],['game_id', '=', $currentGame->id], ['user_id', Auth::user()->id]])->exists()){
                                return redirect()->back();
            };

            // vérifie si le jeu appartient déjà à une autre liste
            if(GameUser::where([['game_id', $currentGame->id],['user_id', Auth::user()->id]])->exists()){
                $currentGame->users()->detach();
                $currentGame->users()->attach(Auth::user(), ['relation' => 'envie']);
            }else{
                $currentGame->users()->attach(Auth::user(), ['relation' => 'envie']);
            };
            toastr()->success('Le jeu a bient été ajouté', 'Succès');
            return redirect()->back();
        }
    }
}
