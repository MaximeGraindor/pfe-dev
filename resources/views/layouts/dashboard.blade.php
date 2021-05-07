<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Gameon - @yield('title')</title>

        {{-- CSS --}}
        @livewireStyles
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    </head>

    <body>
        <div class="dashboard-splitscreen">
            <div class="dashboard-sidebar">
                <h1 role="heading" aria-level="1" class="sidebar-title">
                    Gameon <span class="hidden">- @yield('main title')</span>
                </h1>
                <nav class="sidebar-menu">
                    <h2 role="heading" aria-level="2" class="hidden">
                        Dashboard menu
                    </h2>
                    <ul>
                        <li class="sidebar-menu-item">
                            <a href="/dashboard" class="sidebar-menu-link {{request()->route()->named('dashboard') ? ' sidebar-active' : ''}}">Mon activité</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a href="/calendrier" class="sidebar-menu-link {{request()->route()->named('calendar') ? ' sidebar-active' : ''}}">Calendrier</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a href="/parcourir" class="sidebar-menu-link {{request()->route()->named('browse') ? ' sidebar-active' : ''}}">Parcourir</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a href="#" class="sidebar-menu-link {{request()->route()->named('community') ? ' sidebar-active' : ''}}">Communauté</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a href="/profil" class="sidebar-menu-link {{request()->route()->named('profil') ? ' sidebar-active' : ''}}">Profil</a>
                        </li>
                        @can('add-game', Game::class)
                            <li class="sidebar-menu-item">
                                <a href="/admin/ajouter-jeu" class="sidebar-menu-link {{request()->route()->named('game.create') ? ' sidebar-active' : ''}}">Ajouter un jeu</a>
                            </li>
                        @endcan
                    </ul>
                </nav>
                <div class="sidebar-logout">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="dashboard-right">
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
                                <img src="/img/message.svg" alt="">
                            </a>
                            <a href="/message" class="icon-notifications">
                                <img src="/img/notifications.svg" alt="">
                            </a>
                        </div>
                        <div class="dashboard-top-userProfil">
                            <a href="/profil">
                                {{ Auth::user()->pseudo }}
                            </a>
                            <img src="/img/Login-background.jpg" alt="Photo de profil">
                        </div>
                    </div>
                </div>

                <div class="dashboard-content">
                    @yield('content')
                </div>

            </div>
        </div>

        @livewireScripts
        <script src="{{ asset('/js/app.js') }}"></script>

    </body>

</html>
