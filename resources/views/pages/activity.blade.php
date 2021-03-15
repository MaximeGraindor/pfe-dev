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
                            <img src="{{ asset('storage' . $game->cover_path) }}" alt="">
                            <div class="game-card-button-wrapper">
                                <form action="#" method="post">
                                    @csrf
                                    <input type="submit" value="En cours" name="curent">
                                </form>
                                <form action="#" method="post">
                                    @csrf
                                    <input type="submit" value="Terminé" name="finish">
                                </form>
                                <form action="/jeu/ajouter/{{ $game->id }}" method="post">
                                    @csrf
                                    <input type="submit" value="envie" name="wish">
                                </form>
                            </div>
                        </div>
                        <a href="/jeu/{{ $game->id }}">{{ $game->name }}</a>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </section>
        <section class="activity-section">
            <h2>Terminé récemment</h2>
            <div class="activity-section-wrapper">
                @foreach ($finishGamesList as $games)
                    @foreach ($games->games as $game)
                    <div class="browse-game-card">
                        <div class="game-card-img-container">
                            <img src="{{ asset('storage' . $game->cover_path) }}" alt="">
                            <div class="game-card-button-wrapper">
                                <form action="#" method="post">
                                    @csrf
                                    <input type="submit" value="En cours" name="curent">
                                </form>
                                <form action="#" method="post">
                                    @csrf
                                    <input type="submit" value="Terminé" name="finish">
                                </form>
                                <form action="/jeu/ajouter/{{ $game->id }}" method="post">
                                    @csrf
                                    <input type="submit" value="envie" name="wish">
                                </form>
                            </div>
                        </div>
                        <a href="/jeu/{{ $game->id }}">{{ $game->name }}</a>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </section>
        <section class="activity-section">
            <h2>Envie</h2>
            <div class="activity-section-wrapper">
                @foreach ($wishGamesList as $games)
                    @foreach ($games->games as $game)
                    <div class="browse-game-card">
                        <div class="game-card-img-container">
                            <img src="{{ asset('storage' . $game->cover_path) }}" alt="">
                            <div class="game-card-button-wrapper">
                                <form action="#" method="post">
                                    @csrf
                                    <input type="submit" value="En cours" name="curent">
                                </form>
                                <form action="#" method="post">
                                    @csrf
                                    <input type="submit" value="Terminé" name="finish">
                                </form>
                                <form action="/jeu/ajouter/{{ $game->id }}" method="post">
                                    @csrf
                                    <input type="submit" value="envie" name="wish">
                                </form>
                            </div>
                        </div>
                        <a href="/jeu/{{ $game->id }}">{{ $game->name }}</a>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </section>
    </div>
@endsection
