@extends('layouts.main')
@section('title', 'Gameon - Home')
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
                <a href="/register">S'inscrire</a>
        		<a href="/login">Se connecter</a>
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

    <div class="home-features">
        <div class="home-features-wrap content-size">
            <div class="features-left">
                <img src="//localhost:3000/storage/games/banner/watch-dogs-banner.jpg" alt="">
            </div>
            <div class="features-right">
                <ul>
                    <li>
                        Possédez votre propre bibliothèque
                    </li>
                    <li>
                        Gagnez des récompenses
                    </li>
                    <li>
                        Faites part de votre avis
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <section class="home-lastRelease">
        <div class="lastRelease-wrap content-size">
            <h2 class="lastRelease-title">
                Dernière sortie
            </h2>
            <div class="lastRelease-content">
                @foreach ($lastRelease as $game)
                    <a href="/jeu/{{ $game->id }}" class="lastRelease-game-card">
                        <p class="lastRelease-game-date">{{ ($game->release_date)->format('j M Y') }}</p>
                        <div class="lastRelease-card-img-container">
                            <img src="{{ asset('storage' . $game->cover_path) }}" alt="">
                        </div>
                        <p class="lastRelease-game-title">{{ $game->name }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <div class="home-footer">
        <ul class="footer-menu">
            <li>
                <a href="">à propos</a>
            </li>
            <li>
                <a href="">Contactez-nous</a>
            </li>
            <li>
                <a href="">Politique de confidentialité</a>
            </li>
            <li>
                <a href="">Cookie</a>
            </li>
            <li>
                <a href="">Cookie</a>
            </li>
        </ul>
        <div class="footer-social">
            <a class="icon ic-twitter" href="" title="Twitter"></a>
            <a class="icon ic-instagram" href="" title="Instagram"></a>
            <a class="icon ic-facebook" href="" class="Facebook"></a>
        </div>
        <div class="footer-copyright">
            © 2021 Gameon
        </div>
    </div>
@endsection
