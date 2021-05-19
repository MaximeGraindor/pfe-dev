@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
    <div class="dashboard-activity">
        <section class="activity-section">
            <h2>Jeux en cours</h2>
            <div class="activity-section-wrapper">
                @foreach ($currentGamesList as $games)
                    @foreach ($games->games as $game)
                    <div class="browse-game-card">
                        <div class="game-card-img-container">
                            <img src="{{ asset('storage/games/cover/' . $game->cover_path) }}" alt="{{$game->cover_path }}">
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
                                <form action="/gameuser/{{ $game->slug }}" method="post" class="game-card-deleteRelation">
                                    @csrf
                                    <input type="submit" value="" name="delete">
                                </form>
                            </div>
                        </div>
                        <a href="/jeu/{{ $game->slug }}">{{ $game->name }}</a>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </section>
        <section class="activity-section">
            <h2>Jeux terminé</h2>
            <div class="activity-section-wrapper">
                @foreach ($finishGamesList as $games)
                    @foreach ($games->games as $game)
                    <div class="browse-game-card">
                        <div class="game-card-img-container">
                            <img src="{{ asset('storage/games/cover/' . $game->cover_path) }}" alt="{{$game->cover_path }}">
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
                                <form action="/gameuser/{{ $game->slug }}" method="post" class="game-card-deleteRelation">
                                    @csrf
                                    <input type="submit" value="" name="delete">
                                </form>
                            </div>
                        </div>
                        <a href="/jeu/{{ $game->slug }}">{{ $game->name }}</a>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </section>
        <section class="activity-section">
            <h2>Liste d'envie</h2>
            <div class="activity-section-wrapper">
                @foreach ($wishGamesList as $games)
                    @foreach ($games->games as $game)
                    <div class="browse-game-card">
                        <div class="game-card-img-container">
                            <img src="{{ asset('storage/games/cover/' . $game->cover_path) }}" alt="{{$game->cover_path }}">
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
                                <form action="/gameuser/{{ $game->slug }}" method="post" class="game-card-deleteRelation">
                                    @csrf
                                    <input type="submit" value="" name="delete">
                                </form>
                            </div>
                        </div>
                        <a href="/jeu/{{ $game->slug }}">{{ $game->name }}</a>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </section>
    </div>
@endsection
