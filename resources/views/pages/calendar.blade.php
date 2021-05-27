@extends('layouts.dashboard')
@section('title', 'Calendrier')

@section('content')
    <div class="content-size dashboard-calendar">

        <div class="calendar-filter">
            <form action="#" method="get">
                <div class="calendar-filter-month">
                    <label for="month" class="hidden">Mois</label>
                    <select name="month" id="month">
                        <option value="">Mois</option>
                        <option value="janvier">Janvier</option>
                        <option value="février">Février</option>
                        <option value="mars">Mars</option>
                        <option value="avril">Avril</option>
                        <option value="mai">Mai</option>
                        <option value="Juin">Juin</option>
                        <option value="Juillet">Juillet</option>
                        <option value="Août">Août</option>
                        <option value="Septembre">Septembre</option>
                        <option value="Octobre">Octobre</option>
                        <option value="Novembre">Novembre</option>
                        <option value="Décembre">Décembre</option>
                    </select>
                </div>
                <div class="calendar-filter-year">
                    <label for="year" class="hidden">Année</label>
                    <select name="year" id="year">
                        <option value="">Année</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                    </select>
                </div>
                <div class="calendar-filter-submit">
                    <input type="submit" value="Filtrer">
                </div>
            </form>
        </div>
        <div class="calendar-content">
            <div class="calendar-content-wrapper">
                @if($games->count())
                    @foreach ($games as $game)
                    <a href="/jeu/{{$game->slug}}" class="calendar-release">
                        <div class="release-cover">
                            <img
                            src="{{$game->cover ? "https://images.igdb.com/igdb/image/upload/t_cover_big/".$game->cover->image_id.".jpg" :'/img/game-cover-default.jpg' }}"
                            alt=""
                            height="{{$game->cover ? $game->cover->height : null}}"
                            width="{{$game->cover ? $game->cover->height : null}}">
                        </div>
                        <div class="release-infos">
                            <p class="release-title">{{$game->name}}</p>
                            <p class="release-about">
                                {{$game->summary ? Str::limit($game->summary, 220, $end='...') : 'Pas de synopsis'}}
                            </p>
                            <div class="release-bottom">
                                <span class="release-date">Date de sortie&nbsp;: {{$game->first_release_date ? date('j/m/Y', strtotime($game->first_release_date)) : 'Pas de date'}}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                @else
                    <p class="calendar-noResults">
                        Pas de résultat trouvé
                    </p>
                @endif

            </div>
        </div>
    </div>
@endsection
