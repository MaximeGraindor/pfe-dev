@extends('layouts.dashboard')
@section('title', $game->name)
@section('content')
    <div class="dashboard-game">
        <div class="game-banner">
            <img src="{{asset('storage/games/banner/'. $game->screenshots[0]->name . '.jpg')}}" alt="">
        </div>

        <div class="game-content">

            <div class="game-header">
                {{-- @if(property_exists($game, 'image_id')) --}}
                <img
                    src="{{asset('storage/games/cover/'.$game->cover_path)}}"
                    alt=""
                    height="{{$game->cover ? $game->cover->height : null}}"
                    width="{{$game->cover ? $game->cover->height : null}}"
                    class="game-cover"
                >
                {{-- @else
                    <img
                        src="{{ asset('storage/games/cover/' . $game->cover_path) }}"
                        alt=""
                        height="{{$game->cover ? $game->cover->height : null}}"
                        width="{{$game->cover ? $game->cover->height : null}}"
                        class="game-cover"
                    >
                @endif
 --}}
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
                            {{ $game->description }}
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
                        <dd>{{ $game->release_date }}</dd>
                    </div>
                    <div class="characteristics-wrap">
                        <dt>Editeur</dt>
                        <dd>
                            @if($game->involved_companies)
                                @foreach($game->involved_companies as $key => $involved_company)
                                    <span>
                                        {{ $involved_company->company->name }}
                                    </span>
                                @endforeach
                            @else
                                <span>Pas d'éditeurs répertoriés</span>
                            @endif

                        </dd>
                    </div>
                    <div class="characteristics-wrap">
                        <dt>Mode de jeu</dt>
                        <dd>
                            @if($game->game_modes)
                                @foreach($game->game_modes as $key => $mode)
                                    <span>
                                        {{ $mode->name }}
                                    </span>
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
                            @if($game->platforms)
                                @foreach($game->platforms as $key => $platform)
                                    <span>
                                        {{ $platform->abbreviation }},
                                    </span>
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
                        <img src="{{asset('storage/games/banner/'. $game->screenshots[0]->name . '.jpg')}}" alt="" class="gallerry-current-img">
                        <div class="gallery-thumb">
                            @foreach($game->screenshots as $key => $screenshot)
                                <img src="{{asset('storage/games/banner/'. $screenshot->name . '.jpg')}}" alt="">
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
                @if($game->comments)
                <div class="comments-wrapper">
                    @foreach ($game->comments as $comment)
                        <div class="game-comment">
                            <p class="game-comment-user">
                                {{ $comment->user->pseudo }}
                            </p>
                            <p class="game-comment-content">
                                {{ $comment->content }}
                            </p>
                        </div>
                    @endforeach
                </div>
                @endif
            </section>

        </div>
    </div>
@endsection
