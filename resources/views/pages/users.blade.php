@extends('layouts.dashboard')
@section('title', 'Liste des utilisateurs')
@section('content')
    <div class="dashboard-users">
        @if($currentUser && $title)
            <p class="users-result-title">
                Liste des {{$title}} de {{$currentUser->pseudo}}
            </p>
        @else
        <p class="users-result-title">
            Résultat de la recherche
        </p>
        @endif

        @if($request->pseudo)
        <p class="users-result-text">
            Votre recherche était&nbsp;: {{$request->pseudo}}
        </p>
        @endif
        <div class="users-content">
            <div class="users-content-wrapper">
                @foreach ($users as $user)
                <a href="/profil/{{$user->pseudo}}" class="users-item">
                    <div class="users-item-top">
                        <div>
                            <img src="{{asset('storage/users/picture/'.$user->picture)}}" alt="Photo de profil">
                        </div>
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
                </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
