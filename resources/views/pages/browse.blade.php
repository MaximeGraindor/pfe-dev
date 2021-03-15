@extends('layouts.dashboard')
@section('title', 'Parcourir')

@section('content')
    <div class="dashboard-browse">
        <div class="browse-header">
            <form action="#" method="post" class="browse-form">
                <div class="browse-multiselect">
                    <div class="selectBox" onclick="showCheckboxes()">
                        <select>
                            <option>Éditeur</option>
                        </select>
                        <div class="overSelect"></div>
                    </div>
                    <div id="checkboxes">
                        <label for="ubisoft">
                        <input type="checkbox" id="ubisoft"/>Ubisoft</label>
                    </div>
                </div>
                <div class="browse-multiselect">
                    <div class="selectBox" onclick="showCheckboxes()">
                        <select>
                            <option>Mode de jeu</option>
                        </select>
                        <div class="overSelect"></div>
                    </div>
                    <div id="checkboxes">
                        <label for="ubisoft">
                        <input type="checkbox" id="ubisoft"/>Ubisoft</label>
                    </div>
                </div>
                <div class="browse-multiselect">
                    <div class="selectBox" onclick="showCheckboxes()">
                        <select>
                            <option>Plateforme</option>
                        </select>
                        <div class="overSelect"></div>
                    </div>
                    <div id="checkboxes">
                        <label for="ubisoft">
                        <input type="checkbox" id="ubisoft"/>Ubisoft</label>
                    </div>
                </div>
                <div class="browse-multiselect">
                    <div class="selectBox" onclick="showCheckboxes()">
                        <select>
                            <option>Genre</option>
                        </select>
                        <div class="overSelect"></div>
                    </div>
                    <div id="checkboxes">
                        <label for="ubisoft">
                        <input type="checkbox" id="ubisoft"/>Ubisoft</label>
                    </div>
                </div>
                <div class="browse-form-submit">
                    <input type="submit" value="Rechercher">
                </div>
            </form>
        </div>

        <div class="browse-content">

            @foreach ($games as $game)
                <div class="browse-game-card">
                    <div class="game-card-img-container">
                        <img src="{{ asset('storage' . $game->cover_path) }}" alt="">
                        <div class="game-card-button-wrapper">
                            <form action="/game/addToCurrent/{{ $game->id }}" method="post">
                                @csrf
                                <input type="submit" value="En cours" name="curent">
                            </form>
                            <form action="/game/addToFinish/{{ $game->id }}" method="post">
                                @csrf
                                <input type="submit" value="Terminé" name="finish">
                            </form>
                            <form action="/game/addToWish/{{ $game->id }}" method="post">
                                @csrf
                                <input type="submit" value="envie" name="wish">
                            </form>
                        </div>
                    </div>
                    <a href="/jeu/{{ $game->id }}">{{ $game->name }}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
