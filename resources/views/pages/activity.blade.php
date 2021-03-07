@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
    <div class="dashboard-activity">
        <section>
            <h2>Jeux en cours</h2>
            <p>
                Pas de jeux pour le moment
            </p>
        </section>
        <section>
            <h2>Terminé récemment</h2>
            <p>
                Pas de jeux pour le moment
            </p>
        </section>
        <section>
            <h2>Envie</h2>
            @foreach ($wish as $game)
            <p>
                {{ $game->games[0]->name }}
            </p>
            @endforeach
            <p>
                Pas de jeux pour le moment
            </p>
        </section>
    </div>
@endsection
