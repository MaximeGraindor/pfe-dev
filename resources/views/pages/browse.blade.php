
@extends('layouts.dashboard')
@section('title', 'Parcourir')

@section('content')
    <div class="dashboard-browse">
        <div class="browse-header">
            <form action="#" method="get" class="browse-form">
                <div class="browse-name">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name">
                </div>
                </div>

                <div class="browse-form-submit">
                    <input type="submit" value="Rechercher">
                </div>
            </form>
        </div>

        <div class="browse-content">
            @foreach ($games as $game)
                <div class="browse-game-card">
                    <div class="game-card-img-container">
                        <img
                            src="https://images.igdb.com/igdb/image/upload/t_cover_big/{{$game->cover ? $game->cover->image_id : null}}.jpg"
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
                            <form action="/game/addToWish/{{ $game->slug }}" method="post">
                                @csrf
                                <input type="submit" value="envie" name="wish">
                            </form>
                        </div>
                    </div>
                    <a href="/jeu/{{ $game->slug }}">{{ $game->name }}</a>
                </div>
            @endforeach
        </div>

    </div>
@endsection
