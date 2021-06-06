@extends('layouts.dashboard')
@section('title', 'Calendrier')

@section('content')
    <div class="dashboard-calendar">
        <div class="calendar-filter">
            <h2 class="calendar-title">
                Calendrier des sorties
            </h2>
            <p class="calendar-intro">
                Tenez vous au courant des dernières sorties pour ne rien rater&nbsp;!
            </p>
            <form action="#" method="get">
                <div class="calendar-filter-year">
                    <label for="year" class="hidden">Année</label>
                    <select name="year" id="year">
                        <option value="{{\Carbon\Carbon::now()->subYears(2)->year}}">{{\Carbon\Carbon::now()->subYears(2)->year}}</option>
                        <option value="{{\Carbon\Carbon::now()->subYear()->year}}">{{\Carbon\Carbon::now()->subYear()->year}}</option>
                        <option value="{{\Carbon\Carbon::now()->year}}" selected class="calendar-filter-curentYear">{{\Carbon\Carbon::now()->year}}</option>
                        <option value="{{\Carbon\Carbon::now()->addYear()->year}}">{{\Carbon\Carbon::now()->addYear()->year}}</option>
                        <option value="{{\Carbon\Carbon::now()->addYears(2)->year}}">{{\Carbon\Carbon::now()->addYears(2)->year}}</option>
                        <option value="{{\Carbon\Carbon::now()->addYears(3)->year}}">{{\Carbon\Carbon::now()->addYears(3)->year}}</option>
                        <option value="{{\Carbon\Carbon::now()->addYears(4)->year}}">{{\Carbon\Carbon::now()->addYears(4)->year}}</option>
                        <option value="{{\Carbon\Carbon::now()->addYears(5)->year}}">{{\Carbon\Carbon::now()->addYears(5)->year}}</option>
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
                                {{$game->summary ? Str::limit($game->summary, 250, $end='...') : 'Pas de synopsis'}}
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
            <div class="calendar-pagniation">
                @if (Request::has('page') && Request::get('page') > 1)
                    <a href="{{ route('calendar', ['page' => Request::get('page') - 1]) }}">Page précédente</a>
                @endif
                @if (Request::has('page'))
                    <a href="{{ route('calendar', ['page' => Request::get('page') + 1]) }}">Page suivante</a>
                @else
                    <a href="{{ route('calendar', ['page' =>2]) }}">Next page</a>
                @endif
            </div>
        </div>
    </div>
@endsection
