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
                    <div class="users-user">
                        <div class="user-left">
                            <img src="/img/Login-background.jpg" alt="Photo de profil">
                            <a href="/profil/{{$user->pseudo}}" class="user-pseudo">
                                {{$user->pseudo}}
                            </a>
                            <input type="submit" value="Suivre" class="user-follow-button">
                        </div>
                        <div class="user-right">
                            <div class="user-right-games">
                                @foreach ($user->games as $game)
                                    <img src="{{ asset('storage' . $game->cover_path) }}" alt="">
                                @endforeach
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
