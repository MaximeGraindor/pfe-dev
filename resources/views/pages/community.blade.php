@extends('layouts.dashboard')
@section('title', 'Communauté')
@section('content')
    <div class="dashboard-community">
        <div class="community-wrapper">
            <div class="community-feed">
                <h2 class="feed-title">
                    Activités des abonnements
                </h2>
                <div class="feed-activity">
                    <div class="activity-top">
                        <img src="./img/message.svg" alt="Photo de profil">
                        <span>Zed</span>
                    </div>
                    <div class="activity-content">
                        à ajouter un nouveau jeu
                    </div>
                    <div class="activity-about">
                        img
                    </div>
                </div>
                <div class="feed-activity">
                    <div class="activity-top">
                        <img src="./img/message.svg" alt="Photo de profil">
                        <span>Zed</span>
                    </div>
                    <div class="activity-content">
                        à ajouter un nouveau jeu
                    </div>
                    <div class="activity-about">
                        img
                    </div>
                </div>
                <div class="feed-activity">
                    <div class="activity-top">
                        <img src="./img/message.svg" alt="Photo de profil">
                        <span>Zed</span>
                    </div>
                    <div class="activity-content">
                        à ajouter un nouveau jeu
                    </div>
                    <div class="activity-about">
                        img
                    </div>
                </div>
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
