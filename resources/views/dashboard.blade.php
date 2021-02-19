@extends('layouts.main')

@section('content')
    <div class="dashboard-splitscreen">
        <div class="dashboard-sidebar">
            <h1 role="heading" aria-level="1" class="sidebar-title">
                Gameon <span class="hidden">- Dahsboard</span>
            </h1>
            <nav class="sidebar-menu">
                <h2 role="heading" aria-level="2" class="hidden">
                    Dashboard menu
                </h2>
                <ul>
                    <li class="sidebar-menu-item">
                        <a href="#" class="sidebar-menu-link">Mon activité</a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="#" class="sidebar-menu-link">Calendrier</a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="#" class="sidebar-menu-link">Parcourir</a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="#" class="sidebar-menu-link">Communauté</a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="#" class="sidebar-menu-link">Profil</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="dashboard-content">
            <div class="dashboard-top">
                <div class="dashboard-top-left">
                    <form action="#" class="dashboard-top-form">
                        <label for="search" class="hidden">Rechercher</label>
                        <input type="search" id="search" placeholder="Counter strike Global Offensive">
                        <input type="submit" value="Rechercher">
                    </form>
                </div>
                <div class="dashboard-top-right">
                    <div class="dashboard-top-buttons">
                        <a href="" class="icon-messages">
                            <img src="./img/message.svg" alt="">
                        </a>
                        <a href="/message" class="icon-notifications">
                            <img src="./img/notifications.svg" alt="">
                        </a>
                    </div>
                    <div class="dashboard-top-userProfil">
                        <a href="#">
                            {{ Auth::user()->pseudo }}
                        </a>
                    </div>
                </div>
            </div>
            <p>
                {{ Auth::user()->email }}
            </p>
        </div>
    </div>
@endsection
