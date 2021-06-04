@extends('layouts.dashboard')
@section('title', 'Profil')
@section('content')
    <div class="dashboard-profil">
        <div class="profil-banner"></div>
        <div class="profil-header">
            <div class="profil-header-picture">
                <img src="/img/{{$user->picture}}" alt="Photo de profil">
            </div>
            <div class="profil-info">
                <div class="profil-info-top">
                    <p class="info-top-pseudo">{{$user->pseudo }}</p>
                    @if(Auth::user()->id !== $user->id)
                        <form action="/profil/{{$user->pseudo }}/follow" method="post" class="info-top-follow">
                            @csrf
                            <input type="submit" value="{{Auth::user()->isFollowing($user) ? 'Se désabonner' : 's\'abonner'}}">
                        </form>
                    @else
                        <a href="{{ route('user.profil-edit') }}" title="Modifier son profil" class="info-top-update">
                            <img src="/img/edit-button.svg" alt="Modifier son profil">
                        </a>
                    @endif
                </div>
                <div class="profil-activity">
                    <div class="profil-activity-card">
                        <p>Abonnements</p>
                        <a href="/profil/{{$user->pseudo }}/abonnements">{{$user->followings->count()}}</a>
                    </div>
                    <div class="profil-activity-card">
                        <p>Abonnés</p>
                        <a href="/profil/{{$user->pseudo }}/abonnes">{{$user->followers->count()}}</a>
                    </div>
                </div>
            </div>
        </div>
            <div class="profil-content">
                <section class="profil-badges">
                    <h2 class="badges-title">
                        Badges de récompenses
                    </h2>
                    <div class="badges-content">
                        @if($user->badges->count() === 0)
                            <p>
                                Pas de badges pour le moment. Ajoutez votre premier jeu pour un gagner un&nbsp;!
                            </p>
                        @else
                            @foreach($user->badges as $badge)
                                <div class="badges-item">
                                    <img src="/img/{{$badge->img}}" alt="{{$badge->description}}">
                                    <span>{{$badge->name}}</span>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </section>
                <section class="profil-section">
                    <h2>Jeux en cours</h2>
                    <div class="profil-section-wrapper">
                        @foreach ($currentGamesList as $games)
                            @foreach ($games->games as $game)
                            <div class="profil-game-card">
                                <div class="game-card-img-container">
                                    <img src="{{ $game->cover_path ? asset('storage/games/cover/' . $game->cover_path) : '/img/game-cover-default.jpg' }}" alt="{{$game->cover_path }}">
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
                <section class="profil-section">
                    <h2>Jeux terminé</h2>
                    <div class="profil-section-wrapper">
                        @foreach ($finishGamesList as $games)
                            @foreach ($games->games as $game)
                            <div class="profil-game-card">
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
                <section class="profil-section">
                    <h2>Liste d'envie</h2>
                    <div class="profil-section-wrapper">
                        @foreach ($wishGamesList as $games)
                            @foreach ($games->games as $game)
                            <div class="profil-game-card">
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
        {{-- @endif --}}

    </div>
@endsection
