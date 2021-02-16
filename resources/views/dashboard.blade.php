@extends('layouts.main')

@section('content')
    <div class="dashboard-splitscreen">
        <div class="dashboard-sidebar">
            <h1 role="heading" aria-level="1" class="sidebar-title">
                Gameon <span class="hidden">- Dahsboard</span>
            </h1>
            <nav class="sidebar-menu">
                <h2 class="hidden">
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
            <p>
                {{ Auth::user()->email }}
            </p>
        </div>
    </div>
@endsection
