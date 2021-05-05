@extends('layouts.dashboard')
@section('title', 'Ajouter un jeu')

@section('content')
    <section class="dashboard-addGame content-size">
        <div class="addGame-top">
            <h2 class="addGame-title">
                Ajouter un jeu
            </h2>
            <p class="addGame-intro">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos aliquam temporibus beatae accusantium. Eos, sint quas facere unde tempore nisi sunt quisquam explicabo recusandae ullam, rerum, accusantium inventore ducimus excepturi?
            </p>
        </div>
        <div class="add-game-content">
            <form action="/admin/ajouter-jeu/store" method="post" class="addGame-form">
                @csrf
                <div class="addGame-name">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" placeholder="Watch dogs 2">
                    @error('name')
                        <span class="addgame-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="addGame-release-date">
                    <label for="release-date">Date de sortie</label>
                    <input type="date" name="releaseDate" id="release-date" placeholder="05/04/2022">
                    @error('release-date')
                        <span class="addgame-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="addGame-publisher">
                    <label for="publisher">Éditeur</label>
                    <select name="publisher" id="publisher">
                        @foreach($publishers as $publisher)
                            <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                        @endforeach
                    </select>
                    @error('publisher')
                        <span class="addgame-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="addGame-classification">
                    <label for="classification">Classification</label>
                    <select name="classification" id="classification">
                        <option value="+3">+3</option>
                        <option value="+7">+7</option>
                        <option value="+12">+12</option>
                        <option value="+16">+16</option>
                        <option value="+18">+18</option>
                    </select>
                    @error('classification')
                        <span class="addgame-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="addGame-game-mode">
                    <label for="game-mode">Mode de jeu</label>
                    <select name="gameMode" id="game-mode">
                        @foreach($modes as $mode)
                            <option value="{{$mode->name}}">{{$mode->name}}</option>
                        @endforeach
                    </select>
                    @error('game-mode')
                        <span class="addgame-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="addGame-plateforme">
                    <label for="plateforme">Plateforme</label>
                    <select name="plateforme" id="plateforme">
                        @foreach($plateformes as $plateforme)
                            <option value="{{$plateforme->name}}">{{$plateforme->name}}</option>
                        @endforeach
                    </select>
                    @error('plateforme')
                        <span class="addgame-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="addGame-support">
                    <label for="support">Support</label>
                    <select name="support" id="support">
                        @foreach($supports as $support)
                            <option value="{{$support->name}}">{{$support->name}}</option>
                        @endforeach
                    </select>
                    @error('support')
                        <span class="addgame-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="addGame-genre">
                    <label for="genre">Genre</label>
                    <select name="genre" id="genre">
                        @foreach($genres as $genre)
                            <option value="{{$genre->name}}">{{$genre->name}}</option>
                        @endforeach
                    </select>
                    @error('genre')
                        <span class="addgame-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="addGame-img-cover">
                    <label for="img-cover">Photo de couverture</label>
                    <input type="file" name="imgCover" id="img-cover" placeholder="">
                    @error('img-cover')
                        <span class="addgame-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="addGame-img-banner">
                    <label for="img-banner">Photo de bannière</label>
                    <input type="file" name="imgBanner" id="img-banner" placeholder="">
                    @error('img-banner')
                        <span class="addgame-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="addGame-trailer">
                    <label for="trailer">Bande annonce</label>
                    <input type="url" name="trailer" id="trailer" placeholder="https://www.youtube.com/watch?v=hh9x4NqW0Dw">
                    @error('trailer')
                        <span class="addgame-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="addGame-synopsis">
                    <label for="synopsis">Synopsis</label>
                    <textarea cols="30" rows="10" type="text" name="synopsis" id="synopsis" placeholder="Watch Dogs 2 est un jeu d'aventure en monde ouvert faisant suite aux événements du premier épisode. Ce nouvel opus de la franchise nous entraîne au cœur de la ville de San Francisco dans la peau du nouveau héros Marcus Holloway, un jeune hacker surdoué victime des algorithmes prédictifs du ctOS 2.0 qui l’accusent d’un crime qu’il n’a pas commis. Dans sa quête de vérité, Marcus pourra hacker les infrastructures de la ville ainsi que les personnes qui sont connectées au réseau."></textarea>
                    @error('synopsis')
                        <span class="addgame-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="addGame-submit">
                    <input type="submit" value="Ajouter">
                </div>
            </form>
        </div>
    </section>
@endsection
