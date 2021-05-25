@extends('layouts.dashboard')
@section('title', 'Profil')
@section('content')
    <div class="dashboard-profil">
        <div class="profil-banner"></div>
        <div class="profil-header">
            <img src="/img/Login-background.jpg" alt="">
            <div class="profil-info">
                <p class="profil-info-pseudo">
                    {{ Auth::user()->pseudo }}
                    <a href="/profil/modifier" title="Modifier son profil" class="profil-info-update">
                        <img src="/img/settings.svg" alt="">
                    </a>
                </p>
                <div class="profil-activity">
                    <div class="profil-activity-card">
                        <p>En cours</p>
                        <span>0</span>
                    </div>
                    <div class="profil-activity-card">
                        <p>Terminé</p>
                        <span>0</span>
                    </div>
                    <div class="profil-activity-card">
                        <p>Envie</p>
                        <span>0</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="profil-update">
            <form action="#" method="post">
                <div class="profil-update-picture">
                    <label for="picture">Photo de profil</label>
                    <input type="file">
                </div>
                <div class="profil-update-pseudo">
                    <label for="pseudo">Photo de profil</label>
                    <input type="text" id="pseudo" name="pseudo">
                </div>
                <div class="profil-update-email">
                    <label for="picture">Photo de profil</label>
                    <input type="file">
                </div>
            </form>
        </div>
    </div>
@endsection
