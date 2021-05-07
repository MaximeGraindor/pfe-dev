@extends('layouts.dashboard')
@section('title', 'Calendrier')

@section('content')
    <div class="content-size dashboard-calendar">
        <div class="calendar-filter">
            <form action="#" method="post">
                <div class="calendar-filter-plateforme">
                    <label for="plateforme" class="hidden">Mode de jeu</label>
                    <select name="plateforme" id="plateforme">
                        <option value="">Mode de jeu</option>
                        @foreach ($modes as $mode)
                            <option value="{{$mode->name }}">{{$mode->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="calendar-filter-support">
                    <label for="support" class="hidden">Support</label>
                    <select name="support" id="support">
                        <option value="">Support</option>
                        @foreach ($supports as $support)
                            <option value="{{$support->name }}">{{$support->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="calendar-filter-month">
                    <label for="month" class="hidden">Mois</label>
                    <select name="month" id="month">
                        <option value="">Mois</option>
                        <option value="janvier">Janvier</option>
                        <option value="février">Février</option>
                        <option value="mars">Mars</option>
                        <option value="avril">Avril</option>
                        <option value="mai">Mai</option>
                        <option value="mai">Juin</option>
                        <option value="mai">Juillet</option>
                        <option value="mai">Août</option>
                        <option value="mai">Septembre</option>
                        <option value="mai">Octobre</option>
                        <option value="mai">Novembre</option>
                        <option value="mai">Décembre</option>
                    </select>
                </div>
                <div class="calendar-filter-year">
                    <label for="year" class="hidden">Année</label>
                    <select name="year" id="year">
                        <option value="">Année</option>
                        <option value="2020">2019</option>
                        <option value="2021">2020</option>
                        <option value="2022">2021</option>
                        <option value="2023">2022</option>
                        <option value="2023">2023</option>
                        <option value="2023">2024</option>
                        <option value="2023">2025</option>
                        <option value="2023">2026</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="calendar-content">
            <div class="calendar-content-wrapper">
                <div class="calendar-release">
                    <div class="release-cover">
                        <img src="./storage/games/cover/watch-dogs-2-cover.jpg" alt="">
                    </div>
                    <div class="release-infos">
                        <p class="release-title">Watch Dogs 2</p>
                        <p class="release-about">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis amet tempora omnis a officiis laborum optio ratione tempore velit non quasi ullam sequi quisquam ducimus, aut reiciendis atque, doloribus similique! Lorem ipsum dolor sit amet consectetur...
                        </p>
                        <div class="release-bottom">
                            <span class="release-date">02/05/2022</span>
                            <span class="release-trailer">bande annonce</span>
                        </div>
                    </div>
                </div>
                <div class="calendar-release">
                    <div class="release-cover">
                        <img src="./storage/games/cover/watch-dogs-2-cover.jpg" alt="">
                    </div>
                    <div class="release-infos">
                        <p class="release-title">Watch Dogs 2</p>
                        <p class="release-about">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis amet tempora omnis a officiis laborum optio ratione tempore velit non quasi ullam sequi quisquam ducimus, aut reiciendis atque, doloribus similique! Lorem ipsum dolor sit amet consectetur...
                        </p>
                        <div class="release-bottom">
                            <span class="release-date">02/05/2022</span>
                            <span class="release-trailer">bande annonce</span>
                        </div>
                    </div>
                </div>
                <div class="calendar-release">
                    <div class="release-cover">
                        <img src="./storage/games/cover/watch-dogs-2-cover.jpg" alt="">
                    </div>
                    <div class="release-infos">
                        <p class="release-title">Watch Dogs 2</p>
                        <p class="release-about">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis amet tempora omnis a officiis laborum optio ratione tempore velit non quasi ullam sequi quisquam ducimus, aut reiciendis atque, doloribus similique! Lorem ipsum dolor sit amet consectetur...
                        </p>
                        <div class="release-bottom">
                            <span class="release-date">02/05/2022</span>
                            <span class="release-trailer">bande annonce</span>
                        </div>
                    </div>
                </div>
                <div class="calendar-release">
                    <div class="release-cover">
                        <img src="./storage/games/cover/watch-dogs-2-cover.jpg" alt="">
                    </div>
                    <div class="release-infos">
                        <p class="release-title">Watch Dogs 2</p>
                        <p class="release-about">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis amet tempora omnis a officiis laborum optio ratione tempore velit non quasi ullam sequi quisquam ducimus, aut reiciendis atque, doloribus similique! Lorem ipsum dolor sit amet consectetur...
                        </p>
                        <div class="release-bottom">
                            <span class="release-date">02/05/2022</span>
                            <span class="release-trailer">bande annonce</span>
                        </div>
                    </div>
                </div>
                <div class="calendar-release">
                    <div class="release-cover">
                        <img src="./storage/games/cover/watch-dogs-2-cover.jpg" alt="">
                    </div>
                    <div class="release-infos">
                        <p class="release-title">Watch Dogs 2</p>
                        <p class="release-about">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis amet tempora omnis a officiis laborum optio ratione tempore velit non quasi ullam sequi quisquam ducimus, aut reiciendis atque, doloribus similique! Lorem ipsum dolor sit amet consectetur...
                        </p>
                        <div class="release-bottom">
                            <span class="release-date">02/05/2022</span>
                            <span class="release-trailer">bande annonce</span>
                        </div>
                    </div>
                </div>
                <div class="calendar-release">
                    <div class="release-cover">
                        <img src="./storage/games/cover/watch-dogs-2-cover.jpg" alt="">
                    </div>
                    <div class="release-infos">
                        <p class="release-title">Watch Dogs 2</p>
                        <p class="release-about">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis amet tempora omnis a officiis laborum optio ratione tempore velit non quasi ullam sequi quisquam ducimus, aut reiciendis atque, doloribus similique! Lorem ipsum dolor sit amet consectetur...
                        </p>
                        <div class="release-bottom">
                            <span class="release-date">02/05/2022</span>
                            <span class="release-trailer">bande annonce</span>
                        </div>
                    </div>
                </div>
                <div class="calendar-release">
                    <div class="release-cover">
                        <img src="./storage/games/cover/watch-dogs-2-cover.jpg" alt="">
                    </div>
                    <div class="release-infos">
                        <p class="release-title">Watch Dogs 2</p>
                        <p class="release-about">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis amet tempora omnis a officiis laborum optio ratione tempore velit non quasi ullam sequi quisquam ducimus, aut reiciendis atque, doloribus similique! Lorem ipsum dolor sit amet consectetur...
                        </p>
                        <div class="release-bottom">
                            <span class="release-date">02/05/2022</span>
                            <span class="release-trailer">bande annonce</span>
                        </div>
                    </div>
                </div>
                <div class="calendar-release">
                    <div class="release-cover">
                        <img src="./storage/games/cover/watch-dogs-2-cover.jpg" alt="">
                    </div>
                    <div class="release-infos">
                        <p class="release-title">Watch Dogs 2</p>
                        <p class="release-about">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis amet tempora omnis a officiis laborum optio ratione tempore velit non quasi ullam sequi quisquam ducimus, aut reiciendis atque, doloribus similique! Lorem ipsum dolor sit amet consectetur...
                        </p>
                        <div class="release-bottom">
                            <span class="release-date">02/05/2022</span>
                            <span class="release-trailer">bande annonce</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
