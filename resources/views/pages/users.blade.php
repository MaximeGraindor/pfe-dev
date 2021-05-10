@extends('layouts.dashboard')
@section('title', 'Liste des utilisateurs')
@section('content')
    <div class="dashboard-users">
        <p class="users-rsult-text">
            Résultat de la recherche
        </p>
        <div class="users-content">
            @foreach ($result as $user)
                <a href="/profil/{{$user->pseudo}}">
                    {{$user->pseudo}}
                </a>
            @endforeach
        </div>
    </div>
@endsection
