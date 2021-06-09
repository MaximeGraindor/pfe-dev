<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Gameon - @yield('title')</title>
        <meta name="description" content="Gameon est un site communautaire qui vous permet de créer votre propre bibliothèque de jeux vidéo!">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- CSS --}}
        @livewireStyles
        @toastr_css
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    </head>

    <body>
        <div class="dashboard-splitscreen">
            <div class="dashboard-sidebar">
                <h1 role="heading" aria-level="1" class="sidebar-title">
                    <a href="/dashboard" title="Gameon">Gameon <span class="hidden">- @yield('title')</span></a>
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
                            <a href="/communaute" class="sidebar-menu-link {{request()->route()->named('community') ? ' sidebar-active' : ''}}">Communauté</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a href="/profil/{{ Auth::user()->pseudo }}" class="sidebar-menu-link {{request()->route()->named('profil') ? ' sidebar-active' : ''}}">Profil</a>
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
                        Se deconnecter
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="dashboard-right">
                <div class="dashboard-top">
                    <div class="dashboard-top-left">
                        <p class="dashboard-top-title-rp">
                            <a href="/dashboard">Gameon</a>
                        </p>
                        <form action="/parcourir" class="dashboard-top-form" method="get">
                            <label for="search" class="hidden">Rechercher</label>
                            <input type="search" id="search" placeholder="Dying Light, Watch dogs, ..." name="name">
                            <input type="submit" value="Rechercher">
                        </form>
                    </div>
                    <div class="dashboard-top-right">
                        <div class="dashboard-top-buttons">
                            <a href="" class="icon-messages">
                                <img src="/img/message.svg" alt="tchat">
                            </a>
                            <div href="/message" class="icon-notifications">
                                <div class="icon-notifications-img">
                                    <img src="/img/notifications.svg" alt="Notifications">
                                    <span>{{count(Auth::user()->unreadNotifications)}}</span>
                                </div>
                                <div class="notifications-wrapper">
                                    @if(count(Auth::user()->unreadNotifications) !== 0)
                                        <a href="/notifications/markAsRead" class="notifications-markAsRead">Marquer comme lu</a>
                                        @foreach(Auth::user()->unreadNotifications as $notification)
                                        <ul>
                                            <li class="notification-item">{{$notification->data['following_pseudo']}} a commencé à vous suivre&nbsp;!</li>
                                        </ul>
                                        @endforeach
                                    @else
                                        <p class="notifications-none">Vous n'avez pas de notification récente</p>
                                    @endif


                                </div>
                            </div>
                        </div>
                        <div class="dashboard-top-userProfil">
                            <a href="/profil/{{ Auth::user()->pseudo }}">
                                {{ Auth::user()->pseudo }}
                            </a>
                            <div>
                                <img src="{{asset('storage/users/picture/'.Auth::user()->picture)}}" alt="Photo de profil">
                            </div>
                        </div>
                        <div class="dashboard-top-menu-responsive">
                            <img src="/img/responsive-menu.svg" alt="Menu responsive">
                        </div>
                    </div>
                </div>
                <div class="dashboard-content">
                    @yield('content')
                </div>

            </div>
        </div>

        @livewireScripts
        @jquery
        @toastr_js
        @toastr_render

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="{{ asset('/js/app.js') }}"></script>
    </body>

</html>
