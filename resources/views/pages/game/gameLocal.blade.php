@extends('layouts.dashboard')
@section('title', $game->name)
@section('content')
    <div class="dashboard-game">
        <div class="game-banner">
            <img src="{{$game->screenshots ? asset('storage/games/banner/'. $game->screenshots[0]->name . '.jpg') : null}}" alt="">
        </div>

        <div class="game-content">

            <div class="game-header">
                <div class="game-header-cover-wrapper">
                    <img
                        src="{{asset('storage/games/cover/'.$game->cover_path)}}"
                        alt=""
                        height="{{$game->cover ? $game->cover->height : null}}"
                        width="{{$game->cover ? $game->cover->height : null}}"
                        class="game-cover"
                    >
                    @if($game->ratingsCount())
                        <span> {{floor($game->ratingsAVG())}}/5</span>
                    @endif
                </div>
                <div class="game-header-infos">
                    <h2 class="game-title">
                        {{ $game->name }}
                    </h2>
                    <form action="/jeu/{{$game->id}}/rating" method="post" class="game-rating">
                        @csrf
                        <div class="rating">
                            <label for="rating">Notez le jeu</label>
                            <select name="rating" id="rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <input type="submit" value="Noter">
                        </div>
                    </form>
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
                        <img src="{{asset('storage/games/banner/'. $game->screenshots[0]->name . '.jpg')}}" alt="" class="gallerry-current-img">
                        <div class="gallery-thumb">
                            @foreach($game->screenshots as $key => $screenshot)
                                <img src="{{asset('storage/games/screenshots/'. $screenshot->name . '.jpg')}}" alt="{{$screenshot->name}}" class="gallery-thumb-img">
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
                            @can('update', $comment)
                            <div class="comment-action">
                                {{-- <form action="/comment/{{$comment->id}}/delete" method="post" class="comment-form-update">
                                    @csrf
                                    <input type="submit" value="Modifier" class="comment-update">
                                </form> --}}
                                <form action="/comment/{{$comment->id}}/delete" method="post" class="comment-form-delete">
                                    @csrf
                                    <input type="submit" value="Supprimer" class="comment-delete">
                                </form>
                            </div>
                            @endcan
                            <div class="game-comment-user">
                                <div>
                                    <img src="{{ asset('storage/users/picture/' . $comment->user->picture)}}" alt="Photo de profil">
                                </div>
                                <span>{{ $comment->user->pseudo }}</span>
                            </div>
                            <p class="game-comment-date">
                                {{date('j/m/Y', strtotime($comment->created_at ))}}
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
