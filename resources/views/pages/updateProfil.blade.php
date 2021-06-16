@extends('layouts.dashboard')
@section('title', 'Profil')
@section('content')
    <div class="dashboard-profil">
        <div class="profil-banner"></div>
        <div class="profil-header">
            <div class="profil-header-picture">
                <img src="{{asset('storage/users/picture/'.$user->picture)}}" alt="Photo de profil">
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
            <form
                action="{{ route('user.profil-update') }}"
                method="post"
                class="profil-update-form"
                enctype="multipart/form-data"
                >
                @csrf
                <div class="update-form-wrapper">
                    <label for="picture">Photo</label>
                    <p>La photo ne doit pas dépasser 1mb et faire maximum 500x500</p>
                    <input type="file" id="picture" name="picture" accept=".png,.jpg,.jpeg" >
                    @error('picture')
                        <span>
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="update-form-wrapper">
                    <label for="pseudo">Pseudo</label>
                     <input type="text" id="pseudo" name="pseudo" placeholder="{{Auth::user()->pseudo}}">
                     @error('pseudo')
                        <span>
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="update-form-wrapper">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="{{Auth::user()->email}}">
                    @error('email')
                        <span>
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="update-form-wrapper">
                    <input type="submit" value="Modifier">
                </div>
            </form>
        </section>
        <section class="profil-update">
            <h2 class="profil-update-title">
                Changer de mot de passe
            </h2>
            <form
                action="/profil/edit/password"
                method="post"
                class="profil-update-form"
                enctype="multipart/form-data"
                >
                @csrf
                <div class="update-form-wrapper">
                    <label for="current_password">Mot de passe actuel</label>
                    <div class="password-wrapper-show">
                        <input type="password" id="current_password" name="current_password" accept=".png,.jpg,.jpeg" >
                        <span class="password-action"></span>
                    </div>
                    @error('current_password')
                        <span>
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="update-form-wrapper">
                    <label for="new_password">Nouveau mot de passe</label>
                    <div class="password-wrapper-show">
                        <input type="password" id="new_password" name="new_password">
                        <span class="password-action"></span>
                    </div>
                    @error('new_password')
                        <span>
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="update-form-wrapper">
                    <label for="new_confirm_password">Confirmation du nouveau mot de passe</label>
                    <div class="password-wrapper-show">
                        <input type="password" id="new_confirm_password" name="new_confirm_password">
                        <span class="password-action"></span>
                    </div>
                    @error('new_confirm_password')
                        <span>
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="update-form-wrapper">
                    <input type="submit" value="Changer de mot de passe">
                </div>
            </form>
        </section>
    </div>
@endsection
