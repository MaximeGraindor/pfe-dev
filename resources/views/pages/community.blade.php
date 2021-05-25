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
                            <div>
                                <img src="/img/{{$activity->causer->picture}}" alt="Photo de profil de {{$activity->causer->pseudo}}">
                            </div>
                            <p>
                                <span>{{$activity->causer->pseudo}}</span> à écris un commentaire sur <span>{{App\Models\Game::find($activity->getExtraProperty('attributes')['game_id'])->name}}</span>
                            </p>
                        </div>
                        <div class="feed-activity-bottom">
                            <img src="{{ asset('storage/games/cover/' . App\Models\Game::find($activity->getExtraProperty('attributes')['game_id'])->cover_path)}}" alt="Photo de profil de {{$activity->causer->pseudo}}">
                            <p>
                                {{Str::limit($activity->getExtraProperty('attributes')['content'], 400, $end='...') }}
                            </p>

                        </div>
                            <p>

                        </p>
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
