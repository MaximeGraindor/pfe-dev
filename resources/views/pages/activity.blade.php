@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
    <div class="dashboard-activity">
        @if(count($currentGamesList->games) === 0 && count($finishGamesList->games) === 0 && count($wishGamesList->games) === 0)
            <div class="activity-nogame">
                <div class="activity-nogame-background"></div>
                <div class="activity-nogame-content">
                    <p>
                        Pas encore de jeu ajouté à une liste&nbsp;? <span>Parcourez notre liste&nbsp;!</span>
                    </p>
                    <div class="activity-nogame-games">
                        @foreach($suggestGames as $suggestGame)
                        <div class="activity-game-card">
                            <div class="game-card-img-container">
                                <img src="{{ "https://images.igdb.com/igdb/image/upload/t_cover_big/".$suggestGame->cover->image_id.".jpg" }}" alt="{{$suggestGame->name }}">
                            </div>
                            <a href="/jeu/{{ $suggestGame->slug }}">{{ $suggestGame->name }}</a>
                        </div>
                        @endforeach

                    </div>
                    <a href="/parcourir" class="activity-nogame-link">Parcourir</a>
                </div>
            </div>
        @else
            <div class="activity-wrapper">
                <section class="activity-section">
                    <h2>Jeux en cours</h2>
                    <div class="activity-section-wrapper">
                        @foreach ($currentGamesList->games as $game)
                            <a href="/jeu/{{ $game->slug }}" {{ $game->name }} class="activity-game-card">
                                <div class="activity-game-card-img-container">
                                    <img src="{{ $game->cover_path ? asset('storage/games/cover/' . $game->cover_path) : '/img/game-cover-default.jpg' }}" alt="{{$game->cover_path }}">
                                    <div class="activity-game-card-button-wrapper">
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
                                        <form action="/gameuser/{{ $game->slug }}/delete" method="post" class="game-card-deleteRelation">
                                            @csrf
                                            <input type="submit" value="" name="delete">
                                        </form>
                                    </div>
                                    <span class="open-cta"></span>
                                </div>
                                <span href="/jeu/{{ $game->slug }}">{{ $game->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </section>
                <section class="activity-section">
                    <h2>Jeux terminé</h2>
                    <div class="activity-section-wrapper">
                        @foreach ($finishGamesList->games as $game)
                            <a href="/jeu/{{ $game->slug }}" class="activity-game-card">
                                <div class="activity-game-card-img-container">
                                    <img src="{{ asset('storage/games/cover/' . $game->cover_path) }}" alt="{{$game->cover_path }}">
                                    <div class="activity-game-card-button-wrapper">
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
                                        <form action="/gameuser/{{ $game->slug }}/delete" method="post" class="game-card-deleteRelation">
                                            @csrf
                                            <input type="submit" value="" name="delete">
                                        </form>
                                    </div>
                                    <span class="open-cta"></span>
                                </div>
                                <span href="/jeu/{{ $game->slug }}">{{ $game->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </section>
                <section class="activity-section">
                    <h2>Liste d'envie</h2>
                    <div class="activity-section-wrapper">
                        @foreach ($wishGamesList->games as $game)
                            <a href="/jeu/{{ $game->slug }}" class="activity-game-card">
                                <div class="activity-game-card-img-container">
                                    <img src="{{ asset('storage/games/cover/' . $game->cover_path) }}" alt="{{$game->cover_path }}">
                                    <div class="activity-game-card-button-wrapper">
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
                                        <form action="/gameuser/{{ $game->slug }}/delete" method="post" class="game-card-deleteRelation">
                                            @csrf
                                            <input type="submit" value="" name="delete">
                                        </form>
                                        <span class="close-cta"></span>
                                    </div>
                                    <span class="open-cta"></span>
                                </div>
                                <span href="/jeu/{{ $game->slug }}">{{ $game->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </section>
            </div>
        @endif
    </div>
@endsection
