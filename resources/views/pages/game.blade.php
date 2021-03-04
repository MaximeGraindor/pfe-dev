@extends('layouts.dashboard')
@section('title', $game->name)
@section('content')
    <div class="dashboard-game">
        <div class="game-banner">
            <img src="{{ asset('storage'.$game->banner_path) }}" alt="">
        </div>
        <div class="game-content">
            <div class="game-header">
                <img src="{{ asset('storage'.$game->cover_path) }}" alt="" class="game-cover">
                <div class="game-header-infos">
                    <h2 class="game-title">
                        {{ $game->name }}
                    </h2>
                    <p class="game-description">
                        {{ $game->description }}
                    </p>
                </div>
            </div>

            <section class="game-characteristics">
                <h2 class="characteristics-title">
                    Informations sur le jeu
                </h2>
                <dl>
                    <div class="characteristics-wrap">
                        <dt>Date de sortie</dt>
                        <dd>10 novembre 2020</dd>
                    </div>
                    <div class="characteristics-wrap">
                        <dt>Editeur</dt>
                        <dd>{{ $game->publisher->name }}</dd>
                    </div>
                    <div class="characteristics-wrap">
                        <dt>Classification</dt>
                        <dd>+18</dd>
                    </div>
                    <div class="characteristics-wrap">
                        <dt>Mode de jeu</dt>
                        <dd>Solo</dd>
                    </div>
                    <div class="characteristics-wrap">
                        <dt>Plateforme</dt>
                        <dd>PC</dd>
                    </div>
                </dl>
            </section>

            <section class="game-comments">
                <h2 class="comments-title">
                    Commentaires
                </h2>
                <form action="#" method="post">
                    <textarea name="comment-content" id="" cols="30" rows="10"  placeholder="écrivez un commentaire"></textarea>
                    <input type="submit" value="Envoyer">
                </form>
            </section>

        </div>
    </div>
@endsection
