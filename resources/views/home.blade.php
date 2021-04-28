@extends('layouts.main')
@section('content')
    <div class="content-size">
        <header class="header">
        	<h1 role="heading" aria-level="1" class="header-title">
                Gameon
            </h1>
        	<nav class="header-menu">
                <h2 role="heading" aria-level="2" class="hidden">
                    Naviguation principal
                </h2>
        		<a href="/login">Se connecter</a>
        		<a href="/register">S'inscrire</a>
        	</nav>
        </header>
    </div>

    <div class="home-intro-wrapper">
        <div class="home-intro">
        </div>
        <h1 role="heading" aria-level="1" class="home-intro-title">
            Créez votre propre </br> biblitothèque
        </h1>
        <p class="home-intro-text">
            Rejoignez des milliers d'utilisateurs
        </p>
        <div class="home-intro-cta">
            <a href="#" class="intro-cta-register">S'inscrire</a>
            <a href="#" class="intro-cta-login">Se connecter</a>
        </div>
    </div>
@endsection
