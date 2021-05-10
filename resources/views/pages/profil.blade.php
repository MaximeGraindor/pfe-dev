@extends('layouts.dashboard')
@section('title', 'Profil')
@section('content')
    <div class="dashboard-profil">
        <div class="profil-banner"></div>
        <div class="profil-header">
            <img src="/img/Login-background.jpg" alt="">
            <div class="profil-info">
                <div class="profil-info-top">
                    <p class="info-top-pseudo">{{$user->pseudo }}</p>
                    <a href="/profil/modifier" title="Modifier son profil" class="info-top-update">
                        <img src="/img/settings.svg" alt="Modifier son profil">
                    </a>
                    <form action="/profil/{{$user->pseudo }}/follow" method="post" class="info-top-follow">
                        @csrf
                        <input type="submit" value="{{Auth::user()->isFollowing($user) ? 'Se désabonner' : 's\'abonner'}}">
                    </form>
                </div>
                <div class="profil-activity">
                    <div class="profil-activity-card">
                        <p>Abonnements</p>
                        <span>{{$user->followings->count()}}</span>
                    </div>
                    <div class="profil-activity-card">
                        <p>Abonnés</p>
                        <span>{{$user->followers->count()}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="profil-content">
            <section class="profil-section">
                <h2>Jeux en cours</h2>
                <div class="profil-section-wrapper">
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
            <section class="profil-section">
                <h2>Terminé récemment</h2>
                <div class="profil-section-wrapper">
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
            <section class="profil-section">
                <h2>Envie</h2>
                <div class="profil-section-wrapper">
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
    </div>
@endsection
