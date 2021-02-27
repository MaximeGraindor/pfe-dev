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
                    <img src="{{ asset('storage' . $game->cover_path) }}" alt="">
                    <a href="/jeu/{{ $game->id }}">{{ $game->name }}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
