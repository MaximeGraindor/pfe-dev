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
                    <a href="/register" class="header-menu-register" title="S'inscrire">S'inscrire</a>
                    <a href="/login" class="header-menu-login" title="Se connecter">Se connecter</a>
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
                <a href="/register" class="intro-cta-login" title="inscription">Inscription</a>
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
                <img src="./img/home-about.jpg" alt="Image d'un joueur de jeux vidéo" width="500" height="666">
            </div>
            <div class="gameon-right">
                <h2 class="gameon-title">
                    A propos de Gameon
                </h2>
                <p>
                    Gameon est un site communautaire qui vous permet de trier vos jeux mais aussi de suivre plusieurs utilisateurs pour suivre leurs progression et pouvoir y réagir&nbsp;!
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
                    Ajoutez des jeux a vos listes, écrivez des commentaire, suivez des millier de personne pour gagner des récompenses sous forme de badge et comparez-vous à vos amis!
                </p>
            </div>
            <div class="rewards-left">
                <img src="./img/home-badges.jpg" alt="Image de plusieurs joueurs de jeux vidéo" width="700" height="466">
            </div>
        </div>
    </section>

    <section class="home-comments">
        <div class="home-comments-wrap content-size">
            <div class="comments-left">
                <img src="./img/home-comments.jpg" alt="Image d'un clavier dun ordinateur" width="700" height="466">
            </div>
            <div class="comments-right">
                <h2 class="comments-title" role="heading" aria-level="2">
                    Partagez votre avis
                </h2>
                <p>
                    Vous avez aussi la possibilité de de commenter les jeux et d'y exprimer votre avis&nbsp;! Mais aussi d'y laisser votre appréciation qui viendra s'ajouter à la moyenne des autres utilisateurs&nbsp;!
                </p>
            </div>
        </div>
    </section>

    <section class="home-videogames">
        <div class="videogames-wrap content-size">
            <h2 class="videogames-title" role="heading" aria-level="2">
                32 467 jeux vidéos
            </h2>
            <section class="videogames-lastrelease">
                <h3 class="videogames-title-second" role="heading" aria-level="3">
                    Jeux du moment
                </h3>
                <div class="videogames-content">
                    @foreach ($games as $game)
                        <a href="/jeu/{{ $game->id }}" class="videogames-game-card">
                            <div class="videogames-card-img-container">
                                <img
                                    src="{{ $game->cover ? 'https://images.igdb.com/igdb/image/upload/t_cover_big/'.$game->cover->image_id.'.jpg' : '/img/game-cover-default.jpg' }}"
                                    alt="Cover de{{$game->name }}"
                                    width="271"
                                    height="377">
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
                    @foreach ($lastReleases as $release)
                        <a href="/jeu/{{ $release->id }}" class="videogames-game-card">
                            <p class="videogames-game-date">{{ $game->first_release_date ? date('j/m/Y', strtotime($game->first_release_date)) : '' }}</p>
                            <div class="videogames-card-img-container">
                                <img
                                    src="{{ $release->cover ? 'https://images.igdb.com/igdb/image/upload/t_cover_big/'.$release->cover->image_id.'.jpg' : '/img/game-cover-default.jpg' }}" alt="Cover de{{$release->name }}"
                                    width="271"
                                    height="377">
                            </div>
                            <p class="videogames-game-title">{{ $release->name }}</p>
                        </a>
                    @endforeach
                </div>
            </section>
        </div>
    </section>

    <div class="home-footer">
        <ul class="footer-menu">
            <li>
                <a href="#">Contactez-nous</a>
            </li>
            <li>
                <a href="/termsAndConditions">Politique de confidentialité</a>
            </li>
        </ul>
        <div class="footer-social">
            <a class="icon ic-twitter" href="#" title="Twitter"></a>
            <a class="icon ic-instagram" href="#" title="Instagram"></a>
            <a class="icon ic-facebook" href="#" class="Facebook"></a>
        </div>
        <div class="footer-copyright">
            © 2021 Gameon
        </div>
    </div>
@endsection
