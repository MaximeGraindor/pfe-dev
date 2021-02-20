@extends('layouts.dashboard')
@section('title', 'Profil')
@section('content')
    <div class="dashboard-profil">
        <div class="profil-banner"></div>
        <div class="profil-header">
            <img src="./img/Login-background.jpg" alt="">
            <div class="profil-info">
                <p class="profil-info-pseudo"> {{ Auth::user()->pseudo }}</p>
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
        <div class="profil-content">

        </div>
    </div>
@endsection
