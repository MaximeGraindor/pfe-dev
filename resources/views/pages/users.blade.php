@extends('layouts.dashboard')
@section('title', 'Liste des utilisateurs')
@section('content')
    <div class="dashboard-users">
        <p class="users-result-text">
            Résultat de la recherche
        </p>
        <div class="users-content">
            <div class="users-content-wrapper">
                @foreach ($result as $user)
                <div class="users-item">
                    <div class="users-item-top">
                        <div><img src="./img/{{$user->picture}}" alt="Photo de profil"></div>
                        <span class="users-item-pseudo">
                            {{$user->pseudo}}
                        </span>
                    </div>
                    <div class="users-item-follows">
                        <div>
                            <span>Abonnements</span>
                            <span>{{$user->followings->count()}}</span>
                        </div>
                        <div>
                            <span>Abonnés</span>
                            <span>{{$user->followers->count()}}</span>
                        </div>
                    </div>
                    <form action="/profil/{{$user->pseudo }}/follow" method="post" class="info-top-follow">
                        @csrf
                        <input class="users-item-button" type="submit" value="{{Auth::user()->isFollowing($user) ? 'Se désabonner' : 's\'abonner'}}">
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
