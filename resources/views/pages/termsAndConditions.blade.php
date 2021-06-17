@extends('layouts.main')
@section('title', 'Gameon - Home')
@section('content')
    <div class="home-background">
        <div class="content-size">
            <header class="header">
                <h1 role="heading" aria-level="1" class="header-title">
                    <a href="/">Gameon</a>
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
    </div>
    <section class="termsAndConditions content-size">
        <h2 class="termsAndConditions-title">
            Conditions générales
        </h2>
        <div class="termsAndConditions-content">
            <div class="termsAndConditions-content-wrapper">
                <p class="termsAndConditions-content-title">1.&nbsp;LA SOCIÉTÉ</p>
                <div class="termsAndConditions-content-text">
                    <p>
                        La société BETASERIES SAS, société par actions simplifiées au capital de 1 315 345 euros, immatriculée au RCS de Paris B 817 527 724, dont le siège social est situé à 21 rue de Verdun, 51100 REIMS, propose une application mobile sur iOS et Android (ci-après « les Applications officielles »), un site internet (ci-après « le Site officiel ») et une API ouverte aux développeurs sous conditions. L’ensemble est entièrement gratuit et propose aux Membres la gestion de leur planning, le partage des derniers épisodes vus, en passant par la découverte de nouvelles séries, tout cela entouré de la communauté BetaSeries.
                    </p>
                </div>
            </div>
            <div class="termsAndConditions-content-wrapper">
                <p class="termsAndConditions-content-title">2.&nbsp;ACCEPTATION DES CONDITIONS D’UTILISATION</p>
                <div class="termsAndConditions-content-text">
                    <p>L’accès au Site et aux Applications est réservé à toute personne l’ayant téléchargée ou visité (ci-après le « Visiteur »). Un Visiteur ne pourra cependant faire aucune action sur le Site ou sur les Applications à part visiter les pages ou écrans qui lui sont autorisés. Sur les pages ou écrans non autorisés, il sera invité à se créer un compte (il sera alors un « Membre ») pour aller plus loin.</p>

                    <p>L'acceptation intégrale des présentes Conditions d’Utilisation par le Visiteur est nécessaire lors de son inscription sur le Site ou les Applications. Cette acceptation est matérialisée par l’action du Visiteur de cocher la case “J'ai lu et accepte les conditions générales d'utilisation de Betaseries”, celle-ci tenant lieu de signature électronique, et ayant, de convention expresse, valeur de signature manuscrite entre le Site/les Applications et le Visiteur.</p>

                    <p>Sans cette acceptation par le Visiteur, l'inscription ne pourra pas être validée.</p>
                </div>
            </div>
            <div class="termsAndConditions-content-wrapper">
                <p class="termsAndConditions-content-title">3.&nbsp;DÉFINITIONS</p>
                <div class="termsAndConditions-content-text">
                    <p>L’accès au Site et aux Applications est réservé à toute personne l’ayant téléchargée ou visité (ci-après le « Visiteur »). Un Visiteur ne pourra cependant faire aucune action sur le Site ou sur les Applications à part visiter les pages ou écrans qui lui sont autorisés. Sur les pages ou écrans non autorisés, il sera invité à se créer un compte (il sera alors un « Membre ») pour aller plus loin.</p>

                    <ul>
                        <li>
                            "Chat" désigne un système de messagerie permettant aux Membres de communiquer entre eux par le biais de messages.
                        </li>
                        <li>
                            "Compte" désigne l’espace personnel créé par le Membre sur le Site ou les Applications, contenant ses informations personnelles (identification, statistiques, planning etc.) accessible grâce à la combinaison d’un Pseudonyme et d’un Mot de passe définis par le Visiteur à la création de son Compte.
                        </li>
                        <li>
                            “Conditions d’Utilisation” désigne les présentes Conditions d’utilisation de l'Application que le Visiteur accepte dans leur intégralité lors de la création de son Compte.
                        </li>
                        <li>
                            "Membre" désigne un Visiteur qui possède un Compte identifié sur le Site ou une des Applications.
                        </li>
                        <li>
                            “Mot de Passe” désigne le mot de passe choisi par le Visiteur au moment de la création de son Compte afin d'accéder au Site ou aux Applications. Il doit contenir au moins 6 caractères alphanumériques.
                        </li>
                        <li>
                            “Pseudonyme” est une suite de 3 caractères minimum et pouvant aller jusqu’à 24 caractères et ne pouvant contenir que des lettres, chiffres, underscore. Il désigne le nom choisi par le Membre pour le représenter sur le Site ou les applications.
                        </li>
                        <li>
                            « La Société » désigne la société BETASERIES SAS.
                        </li>
                        <li>
                            “Supports” : désignent l’ensemble des sites, applications utilisant BetaSeries, y compris le site et les applications officielles.
                        </li>
                        <li>
                            “Supports officiels” : désignent l’ensemble des sites et applications édité directement par la Société.
                        </li>
                        <li>
                            “Visiteur” est une personne qui n’a pas encore créé de compte sur l’Application.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="home-footer">
        <ul class="footer-menu">
            <li>
                <a href="#">Contactez-nous</a>
            </li>
            <li>
                <a href="/termsAndConditions">Conditions générales</a>
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
