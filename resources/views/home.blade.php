@extends('layouts.main')
@section('title', 'Gameon - Home')
@section('content')
    <div class="home-background">
        <div class="content-size">
            <header class="header">
                <h1 role="heading" aria-level="1" class="header-title">
                    Gameon
                </h1>
                <nav class="header-menu">
                    <h2 role="heading" aria-level="2" class="hidden">
                        Naviguation principal
                    </h2>
                    <a href="/register" class="header-menu-register">S'inscrire</a>
                    <a href="/login" class="header-menu-login">Se connecter</a>
                </nav>
            </header>
        </div>
        <div class="home-intro-wrapper">
            <div class="home-intro-banner">
            </div>
            <p class="home-intro-title">
                Créez votre propre bibliothèque de <span class="home-intro-weight">jeux vidéos</span>
            </p>
            <p class="home-intro-text">
                Rejoignez plus de 400 000 utilisateurs
            </p>
            <div class="home-intro-cta">
                <a href="#" class="intro-cta-login">Inscription</a>
            </div>
            <div class="home-intro-infos content-size">
                <div class="infos-item">
                    <div class="infos-item-content infos-users">
                        <span class="infos-big">
                            +400k
                        </span>
                        <span class="infos-little">
                            utilisateurs
                        </span>
                    </div>
                </div>
                <div class="infos-item">
                    <div class="infos-item-content infos-games">
                        <span class="infos-big">
                            +50k
                        </span>
                        <span class="infos-little">
                            Jeux vidéos
                        </span>
                    </div>
                </div>
                <div class="infos-item">
                    <div class="infos-item-content infos-comments">
                        <span class="infos-big">
                            +20k
                        </span>
                        <span class="infos-little">
                            Commentaires
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="home-gameon">
        <div class="home-gameon-wrap content-size">
            <div class="gameon-left">
                <img src="./img/home-about.jpg" alt="">
            </div>
            <div class="gameon-right">
                <h2 class="gameon-title">
                    A propos de Gameon
                </h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt inventore aut, cupiditate distinctio numquam ratione cum iusto voluptate, aliquid blanditiis ducimus recusandae obcaecati consectetur vero ab facere quam. Alias, minima?
                </p>
            </div>
        </div>
    </section>

    <section class="home-rewards">
        <div class="home-rewards-wrap content-size">
            <div class="rewards-right">
                <h2 class="rewards-title" role="heading" aria-level="2">
                    Remportez des badges
                </h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt inventore aut, cupiditate distinctio numquam ratione cum iusto voluptate, aliquid blanditiis ducimus recusandae obcaecati consectetur vero ab facere quam. Alias, minima?
                </p>
            </div>
            <div class="rewards-left">
                <img src="./img/home-badges.jpg" alt="">
            </div>
        </div>
    </section>

    <section class="home-comments">
        <div class="home-comments-wrap content-size">
            <div class="comments-left">
                <img src="./img/home-comments.jpg" alt="">
            </div>
            <div class="comments-right">
                <h2 class="comments-title" role="heading" aria-level="2">
                    Partagez votre avis
                </h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt inventore aut, cupiditate distinctio numquam ratione cum iusto voluptate, aliquid blanditiis ducimus recusandae obcaecati consectetur vero ab facere quam. Alias, minima?
                </p>
            </div>
        </div>
    </section>

    <section class="home-videogames">
        <div class="videogames-wrap content-size">
            <h2 class="videogames-title" role="heading" aria-level="2">
                32 467 jeux vidéos
            </h2>
            {{-- <section class="videogames-lastrelease">
                <h3 class="videogames-title-second" role="heading" aria-level="3">
                    Jeux favoris
                </h3>
                <div class="videogames-content">
                    @foreach ($games as $game)
                        <a href="/jeu/{{ $game->id }}" class="videogames-game-card">
                            <div class="videogames-card-img-container">
                                <img src="{{ $game->cover_path ? asset('storage/games/cover/' . $game->cover_path) : '/img/game-cover-default.jpg' }}" alt="{{$game->cover_path }}">
                            </div>
                            <p class="videogames-game-title">{{ $game->name }}</p>
                        </a>
                    @endforeach
                </div>
            </section>
            <section class="videogames-lastrelease">
                <h3 class="videogames-title-second" role="heading" aria-level="3">
                    Dernière sortie
                </h3>
                <div class="videogames-content">
                    @foreach ($games as $game)
                        <a href="/jeu/{{ $game->id }}" class="videogames-game-card">
                            <p class="videogames-game-date">{{ $game->first_release_date ? date('j/m/Y', strtotime($game->first_release_date)) }}</p>
                            <div class="videogames-card-img-container">
                                <img src="{{ asset('storage' . $game->cover_path) }}" alt="">
                            </div>
                            <p class="videogames-game-title">{{ $game->name }}</p>
                        </a>
                    @endforeach
                </div>
            </section> --}}
        </div>
    </section>

    <div class="home-footer">
        <ul class="footer-menu">
            <li>
                <a href="">Contactez-nous</a>
            </li>
            <li>
                <a href="">Politique de confidentialité</a>
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
