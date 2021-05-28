@extends('layouts.dashboard')
@section('title', 'Communauté')
@section('content')
    <div class="dashboard-community">
        <div class="community-wrapper">
            <div class="community-feed">
                <h2 class="feed-title">
                    Activités des abonnements
                </h2>
                @foreach($activities as $key => $activity)
                    <div class="feed-activity">
                        @if(array_key_exists('game_id', $activity->getExtraProperty('attributes')))
                        <div class="feed-activity-top feed-comment">
                            <div class="feed-activity-top-img">
                                <img src="/img/{{$activity->causer->picture}}" alt="Photo de profil de {{$activity->causer->pseudo}}">
                            </div>
                            <div class="feed-activity-top-infos">
                                <p>
                                    <a href="/profil/{{$activity->causer->pseudo}}">{{$activity->causer->pseudo}}</a> a écrit un commentaire sur <a href="/jeu/{{App\Models\Game::find($activity->getExtraProperty('attributes')['game_id'])->slug}}">{{App\Models\Game::find($activity->getExtraProperty('attributes')['game_id'])->name}}</a>
                                </p>
                                <span>
                                   {{date('j/m/Y', strtotime($activity->created_at))}}
                                </span>
                            </div>
                        </div>
                        <div class="feed-activity-bottom">
                            <img
                                src="{{ asset('storage/games/cover/' . App\Models\Game::find($activity->getExtraProperty('attributes')['game_id'])->cover_path)}}"
                                alt="cover de {{App\Models\Game::find($activity->getExtraProperty('attributes')['game_id'])->name}}">
                            <p>
                                {{Str::limit($activity->getExtraProperty('attributes')['content'], 400, $end='...') }}
                            </p>
                        </div>
                        <div class="feed-activity-infos">
                            <span class="feed-activity-comments">{{count($activity->replies)}}</span>
                            <form action="/activity/{{$activity->id}}/like" method="post">
                                @csrf
                                <button class="feed-activity-likes {{Auth::user()->hasLiked($activity) ? 'likes-active' : 'yes'}}">{{$activity->likers()->count()}}</button>
                            </form>

                        </div>
                        <div class="feed-activity-reply feed-activity-reply-disable">
                            <form action="/communaute/{{$activity->id}}/replies" method="post">
                                @csrf
                                <label for="reply">Commentaire</label>
                                <textarea name="reply" id="reply" cols="30" rows="10"></textarea>
                                <input type="submit" value="Envoyer">
                            </form>
                            @foreach($activity->replies as $replies)
                            <div class="reply-item">
                                <div class="reply-item-top">
                                    <div><img src="./img/{{$replies->user->picture}}" alt=""></div>
                                    <span>{{$replies->user->pseudo}} - {{date('j/m/Y', strtotime($replies->created_at))}}</span>
                                </div>
                                <div class="reply-item-bottom">
                                    <p>
                                        {{$replies->content}}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="community-right">
                <div class="community-suggestions">
                    <h2 class="suggestions-title">
                        Suggestions
                    </h2>
                    @foreach($usersSuggest as $suggest)
                    <div class="suggestions-item">
                        <div class="suggestions-item-top">
                            <div><img src="./img/{{$suggest->picture}}" alt="Photo de profil"></div>
                            <span class="suggestions-item-pseudo">
                                {{$suggest->pseudo}}
                            </span>
                        </div>
                        <div class="suggestions-item-follows">
                            <div>
                                <span>Abonnements</span>
                                <span>{{$suggest->followings->count()}}</span>
                            </div>
                            <div>
                                <span>Abonnés</span>
                                <span>{{$suggest->followers->count()}}</span>
                            </div>
                        </div>
                        <form action="/profil/{{$suggest->pseudo }}/follow" method="post" class="info-top-follow">
                            @csrf
                            <input class="suggestions-item-button" type="submit" value="{{Auth::user()->isFollowing($suggest) ? 'Se désabonner' : 's\'abonner'}}">
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
