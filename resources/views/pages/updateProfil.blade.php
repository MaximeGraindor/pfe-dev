@extends('layouts.dashboard')
@section('title', 'Profil')
@section('content')
    <div class="dashboard-profil">
        <div class="profil-banner"></div>
        <div class="profil-header">
            <div class="profil-header-picture">
                <img src="/img/{{$user->picture}}" alt="Photo de profil">
            </div>
            <div class="profil-info">
                <div class="profil-info-top">
                    <p class="info-top-pseudo">{{$user->pseudo }}</p>
                    @if(Auth::user()->id !== $user->id)
                        <form action="/profil/{{$user->pseudo }}/follow" method="post" class="info-top-follow">
                            @csrf
                            <input type="submit" value="{{Auth::user()->isFollowing($user) ? 'Se désabonner' : 's\'abonner'}}">
                        </form>
                    @else
                        <a href="{{ route('user.profil-edit') }}" title="Modifier son profil" class="info-top-update">
                            <img src="/img/edit-button.svg" alt="Modifier son profil">
                        </a>
                    @endif
                </div>
                <div class="profil-activity">
                    <div class="profil-activity-card">
                        <p>Abonnements</p>
                        <a href="/profil/{{$user->pseudo }}/abonnements">{{$user->followings->count()}}</a>
                    </div>
                    <div class="profil-activity-card">
                        <p>Abonnés</p>
                        <a href="/profil/{{$user->pseudo }}/abonnes">{{$user->followers->count()}}</a>
                    </div>
                </div>
            </div>
        </div>
        <section class="profil-update">
            <h2 class="profil-update-title">
                Modifier votre profil
            </h2>
            <form action="{{ route('user.profil-update') }}" method="post" class="profil-update-form">
                @csrf
                <div>
                    <label for="picture">Photo</label>
                    <p>La photo ne doit pas dépasser 1mb et faire maximum 500x500</p>
                    <input type="file" id="picture" name="picture" >
                    @error('picture')
                        <span>
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="pseudo">Pseudo</label>
                     <input type="text" id="pseudo" name="pseudo" value="{{Auth::user()->pseudo}}">
                     @error('pseudo')
                        <span>
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{Auth::user()->email}}">
                    @error('email')
                        <span>
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div>
                    <input type="submit" value="Modifier">
                </div>
            </form>
        </section>
    </div>
@endsection
