@extends('layouts.dashboard')
@section('title', $game->name)
@section('content')
    <div class="dashboard-game">
        <div class="game-banner">
            <img src="https://images.igdb.com/igdb/image/upload/t_screenshot_big/{{$game->screenshots ? $game->screenshots[0]->image_id : null}}.jpg" alt="">
        </div>

        <div class="game-content">

            <div class="game-header">
                <div>
                    <img
                        {{-- src="https://images.igdb.com/igdb/image/upload/t_cover_big/{{$game->cover ? $game->cover->image_id : null}}.jpg" --}}
                        src="{{ $game->cover ? 'https://images.igdb.com/igdb/image/upload/t_cover_big/' . $game->cover->image_id . '.jpg' : '/img/game-cover-default.jpg' }}"
                        alt=""
                        height="{{$game->cover ? $game->cover->height : null}}"
                        width="{{$game->cover ? $game->cover->height : null}}"
                        class="game-cover"
                    >
                    <div class="game-forms">
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
                <div class="game-header-infos">
                    <h2 class="game-title">
                        {{ $game->name }}
                    </h2>
                    @if(property_exists($game, 'description'))
                        <p class="game-description">
                            {{ $game->description }}
                        </p>
                    @else
                        <p class="game-description">
                            {{ $game->summary }}
                        </p>
                    @endif

                </div>
            </div>

            <section class="game-characteristics">
                <h2 class="characteristics-title">
                    Informations sur le jeu
                </h2>
                <dl>
                    <div class="characteristics-wrap">
                        <dt>Date de sortie</dt>
                        <dd>{{ date('j/m/Y', strtotime($game->first_release_date)) }}</dd>
                    </div>
                    <div class="characteristics-wrap">
                        <dt>Editeur</dt>
                        <dd>
                            @if($game->publishers)
                                @foreach($game->publishers as $key => $publisher)
                                    <a href="/parcourir?publisher={{$publisher->name}}">
                                        {{ $publisher->name }}
                                    </a>
                                @endforeach
                            @else
                                <span>Pas d'éditeurs répertoriés</span>
                            @endif

                        </dd>
                    </div>
                    <div class="characteristics-wrap">
                        <dt>Genres</dt>
                        <dd>
                            @if($game->genres)
                                @foreach($game->genres as $key => $genre)
                                    <a href="/parcourir?genre={{$genre->name}}">
                                        {{ $genre->name }}
                                    </a>
                                @endforeach
                            @else
                                <span>Pas d'éditeurs répertoriés</span>
                            @endif

                        </dd>
                    </div>
                    <div class="characteristics-wrap">
                        <dt>Mode de jeu</dt>
                        <dd>
                            @if($game->modes)
                                @foreach($game->modes as $key => $mode)
                                <a href="/parcourir?mode={{$mode->name}}">
                                    {{ $mode->name }}
                                </a>
                                @endforeach
                            @else
                                <span>
                                    Pas de modes de jeu répertoriés
                                </span>
                            @endif

                        </dd>
                    </div>
                    <div class="characteristics-wrap">
                        <dt>Plateforme</dt>
                        <dd>
                            @if($game->plateformes)
                                @foreach($game->plateformes as $key => $platform)
                                    <a href="/parcourir?platform={{$platform->name}}">
                                        {{ $platform->name }}
                                    </a>
                                @endforeach
                            @else
                                <span>Pas de plateformes répertoriés</span>
                            @endif


                        </dd>
                    </div>
                </dl>
            </section>

            <section class="game-gallery">
                <h2 class="gallery-title">
                    Gallerie
                </h2>
                @if($game->screenshots)
                    <div class="gallery-content">
                        <img src="https://images.igdb.com/igdb/image/upload/t_screenshot_big/{{$game->screenshots[0]->image_id}}.jpg" alt="" class="gallerry-current-img">
                        <div class="gallery-thumb">
                            @foreach($game->screenshots as $key => $screenshot)
                                <img src="https://images.igdb.com/igdb/image/upload/t_screenshot_big/{{$screenshot->image_id}}.jpg" alt="" class="gallery-thumb-img">
                            @endforeach
                        </div>
                    </div>
                @else
                    <p>
                        Pas de photos répertoriées
                    </p>
                @endif

            </section>

            <section class="game-comments">
                <h2 class="comments-title">
                    Commentaires
                </h2>
                <form action="/{{$game->slug}}/comments" method="post">
                    @csrf
                    <textarea name="commentContent" id="" cols="30" rows="10"  placeholder="écrivez un commentaire"></textarea>
                    <input type="hidden" name="gameId" value="{{ $game->id }}">
                    <input type="submit" value="Envoyer">
                </form>
            </section>

        </div>
    </div>
@endsection
