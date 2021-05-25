
@extends('layouts.dashboard')
@section('title', 'Parcourir')

@section('content')
    <div class="dashboard-browse">
        <div class="browse-header">
            <form action="#" method="get" class="browse-filter">
                <div class="browse-platform">
                    <label for="platform" class="hidden">Plateforme</label>
                    <select name="platform" id="platform">
                        <option value="">Plateforme</option>
                        @foreach($platforms as $platform)
                            <option value="{{$platform->name}}">{{$platform->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="browse-genre">
                    <label for="genre" class="hidden">Plateforme</label>
                    <select name="genre" id="genre">
                        <option value="">Genre</option>
                        {{-- @foreach($genres as $genre)
                            <option value="{{$genre->name}}">{{$genre->name}}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="browse-mode">
                    <label for="mode" class="hidden">Plateforme</label>
                    <select name="mode" id="mode">
                        <option value="">Mode de jeu</option>
                        {{-- @foreach($modes as $mode)
                            <option value="{{$mode->name}}">{{$mode->name}}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="browse-name">
                    <label for="name" class="hidden">Nom</label>
                    <input type="text" id="name" name="name" placeholder="rechercher">
                </div>

                <div class="browse-submit">
                    <input type="submit" value="Rechercher">
                </div>
            </form>
        </div>

        <div class="browse-content">
            @foreach ($games as $game)
                <div class="browse-game-card">
                    <div class="browse-card-img">
                        <img
                            src="{{$game->cover ? "https://images.igdb.com/igdb/image/upload/t_cover_big/".$game->cover->image_id.".jpg" :'/img/game-cover-default.jpg' }}"
                            alt=""
                            height="{{$game->cover ? $game->cover->height : null}}"
                            width="{{$game->cover ? $game->cover->height : null}}">
                        <div class="game-card-button-wrapper">
                            <form action="/game/addToCurrent/{{ $game->slug }}" method="post">
                                @csrf
                                <input type="submit" value="En cours" name="curent">
                            </form>
                            <form action="/game/addToFinish/{{ $game->slug }}" method="post">
                                @csrf
                                <input type="submit" value="Terminé" name="finish">
                            </form>
                            <form action="/game/addToWish/{{ $game->slug }}"" method="post">
                                @csrf
                                <input type="submit" value="envie" name="wish">
                            </form>
                        </div>
                    </div>
                    <div class="browse-card-infos">
                        <a href="/jeu/{{ $game->slug }}">{{ Str::limit($game->name, 50, $end='...') }} <span>({{date('Y', strtotime($game->first_release_date))}})</span></a>
                        @if($game->platforms)
                            <div class="browse-card-infos-platforms">
                                @foreach($game->platforms as $platform)
                                    <a href="?platform={{$platform->abbreviation}}">{{$platform->abbreviation}}</a>
                                @endforeach
                            </div>
                        @endif
                        <p class="browse-card-infos-summary">
                            {{$game->summary ? Str::limit($game->summary, 300, $end='...') : 'Pas de synopsis'}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{$games->links()}}
        </div>
    </div>
@endsection
