@extends('layouts.dashboard')
@section('title', 'Communauté')
@section('content')
    <div class="dashboard-community">
        <div class="community-wrapper">
            <div>
                <form action="/utilisateurs" class="community-form">
                    <label for="search" class="hidden">Rechercher</label>
                    <input type="search" id="search" placeholder="Utilisateurs" name="pseudo">
                    <input type="submit" value="Rechercher">
                </form>
                <div class="community-feed">
                    <h2 class="feed-title">
                        Activités des abonnements
                    </h2>
                    @foreach($activities as $key => $activity)
                        @livewire("show-activity", ['activity' => $activity])
                    @endforeach
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
                            <div>
                                <img src="{{asset('storage/users/picture/' . $suggest->picture)}}" alt="Photo de profil">
                            </div>
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
