<div class="feed-activity">
    @if(Arr::exists($activity->properties, 'game_id'))
    {{-- ACTION DE L'ACTIVITE--}}
    <div class="feed-activity-top feed-comment">
        <div class="feed-activity-top-img">
            <img src="{{asset('storage/users/picture/' . $activity->causer->picture)}}" alt="Photo de profil de {{$activity->causer->pseudo}}">
        </div>
        <div class="feed-activity-top-infos">
            <p>
                <a href="/profil/{{$activity->causer->pseudo}}">{{$activity->causer->pseudo}}</a>
                a écrit un commentaire sur
                <a href="/jeu/{{App\Models\Game::find($activity->properties['game_id'])->slug}}">{{App\Models\Game::find($activity->properties['game_id'])->name}}</a>
            </p>
            <span>
               {{date('j/m/Y', strtotime($activity->created_at))}}
            </span>
        </div>
    </div>

    {{-- CONTENU DE L'ACTIVITE --}}
    <div class="feed-activity-bottom">
        <img
            src="{{ asset('storage/games/cover/' . App\Models\Game::find($activity->properties['game_id'])->cover_path)}}"
            alt="cover de {{App\Models\Game::find($activity->properties['game_id'])->name}}">
        <p>
            {{Str::limit($activity->properties['content'], 400, $end='...') }}
        </p>
    </div>
    <div class="feed-activity-infos">
        <span class="feed-activity-comments">{{count($activity->replies)}}</span>
        <form action="/activity/{{$activity->id}}/like" method="post">
            @csrf
            <button class="feed-activity-likes {{Auth::user()->hasLiked($activity) ? 'likes-active' : 'null'}}" wire:click="like">{{$activity->likers()->count()}}</button>
        </form>

    </div>

    {{-- COMMENTAIRES --}}
    <div class="feed-activity-reply feed-activity-reply-disable">
        <form action="/communaute/{{$activity->id}}/replies" method="post">
            @csrf
            <label for="reply">Commentaire</label>
            <textarea name="body" id="reply" cols="30" rows="10"></textarea>
            <input type="submit" value="Envoyer">
        </form>
        @foreach($activity->replies as $reply)
        <div class="reply-item">
            <div class="reply-item-top">
                <div class="reply-item-top-img">
                    <img src="{{asset('storage/users/picture/' . $reply->user->picture)}}" alt="">
                </div>
                <span>{{$reply->user->pseudo}} - {{date('j/m/Y', strtotime($reply->created_at))}}</span>
            </div>

            <div class="reply-item-bottom">
                <p>
                    {{$reply->body}}
                </p>
               <span class="reply-item-bottom-form">Répondre</span>

                <div class="reply-item-replies">
                    <form action="/reply/{{$reply->id}}/reply" method="post" class="reply-form-disable">
                        @csrf
                        <label for="reply">Commentaire</label>
                        <textarea name="reply" id="reply" cols="30" rows="10"></textarea>
                        <input type="submit" value="Envoyer">
                    </form>
                    @foreach ($reply->replies as $rep)
                        <div class="reply-bottom-replies">
                            <div class="replies-item">
                                <div class="replies-user">
                                    <div><img src="{{asset('storage/users/picture/' . $rep->user->picture)}}" alt=""></div>
                                    <span>{{$rep->user->pseudo}} - {{date('j/m/Y', strtotime($rep->created_at))}}</span>
                                </div>
                                <p>
                                    {{$rep->body}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif


    @if($activity->subject_type === App\Models\Badge::class)
    {{-- ACTION DE L'ACTIVITE--}}
    <div class="feed-activity-top feed-badge">
        <div class="feed-activity-top-img">
            <img src="{{asset('storage/users/picture/' . $activity->causer->picture)}}" alt="Photo de profil de {{$activity->causer->pseudo}}">
        </div>
        <div class="feed-activity-top-infos">
            <p>
                <a href="/profil/{{$activity->causer->pseudo}}">{{$activity->causer->pseudo}}</a>
                a gagné le badge
                <span>{{App\Models\Badge::find($activity->subject_id)->name}}</span>
            </p>
            <span>
               {{date('j/m/Y', strtotime($activity->created_at))}}
            </span>
        </div>
    </div>

    {{-- CONTENU DE L'ACTIVITE --}}
    <div class="feed-activity-bottom">
        <img
            src="{{ asset('img/' . App\Models\Badge::find($activity->subject_id)->img)}}"
            alt="image de {{App\Models\Badge::find($activity->subject_id)->name}}">
        <p>
            {{App\Models\Badge::find($activity->subject_id)->name}}
        </p>
    </div>
    <div class="feed-activity-infos">
        <span class="feed-activity-comments">{{count($activity->replies)}}</span>
        <form action="/activity/{{$activity->id}}/like" method="post">
            @csrf
            <button class="feed-activity-likes {{Auth::user()->hasLiked($activity) ? 'likes-active' : 'null'}}" wire:click="like">{{$activity->likers()->count()}}</button>
        </form>

    </div>

    {{-- COMMENTAIRES --}}
    <div class="feed-activity-reply feed-activity-reply-disable">
        <form action="/communaute/{{$activity->id}}/replies" method="post">
            @csrf
            <label for="reply">Commentaire</label>
            <textarea name="body" id="reply" cols="30" rows="10"></textarea>
            <input type="submit" value="Envoyer">
        </form>
        @foreach($activity->replies as $reply)
        <div class="reply-item">
            <div class="reply-item-top">
                <div class="reply-item-top-img">
                    <img src="{{asset('storage/users/picture/' . $reply->user->picture)}}" alt="">
                </div>
                <span>{{$reply->user->pseudo}} - {{date('j/m/Y', strtotime($reply->created_at))}}</span>
            </div>

            <div class="reply-item-bottom">
                <p>
                    {{$reply->body}}
                </p>
               <span class="reply-item-bottom-form">Répondre</span>

                <div class="reply-item-replies">
                    <form action="/reply/{{$reply->id}}/reply" method="post" class="reply-form-disable">
                        @csrf
                        <label for="reply">Commentaire</label>
                        <textarea name="reply" id="reply" cols="30" rows="10"></textarea>
                        <input type="submit" value="Envoyer">
                    </form>
                    @foreach ($reply->replies as $rep)
                        <div class="reply-bottom-replies">
                            <div class="replies-item">
                                <div class="replies-user">
                                    <div><img src="{{asset('storage/users/picture/' . $rep->user->picture)}}" alt=""></div>
                                    <span>{{$rep->user->pseudo}} - {{date('j/m/Y', strtotime($rep->created_at))}}</span>
                                </div>
                                <p>
                                    {{$rep->body}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif


    @if(Arr::exists($activity->properties, 'relation'))
    {{-- ACTION DE L'ACTIVITE--}}
    <div class="feed-activity-top feed-badge">
        <div class="feed-activity-top-img">
            <img src="{{asset('storage/users/picture/' . $activity->causer->picture)}}" alt="Photo de profil de {{$activity->causer->pseudo}}">
        </div>
        <div class="feed-activity-top-infos">
            <p>
                <a href="/profil/{{$activity->causer->pseudo}}">{{$activity->causer->pseudo}}</a>
                a ajouté <a href="/jeu/{{App\Models\Game::find($activity->subject_id)->slug}}">{{App\Models\Game::find($activity->subject_id)->name}}</a>
                à sa liste
                <span>{{$activity->properties['relation']}}</span>
            </p>
            <span class="feed-activity-top-date">
               {{date('j/m/Y', strtotime($activity->created_at))}}
            </span>
        </div>
    </div>

    {{-- CONTENU DE L'ACTIVITE --}}
    <div class="feed-activity-bottom">
        <img
            src="{{ asset('storage/games/cover/' . App\Models\Game::find($activity->subject_id)->cover_path)}}"
            alt="image de {{App\Models\Game::find($activity->subject_id)->name}}">
        <p>
            {{Str::limit(App\Models\Game::find($activity->subject_id)->description, 400, $end='...') }}
        </p>
    </div>
    <div class="feed-activity-infos">
        <span class="feed-activity-comments">{{count($activity->replies)}}</span>
        <form action="/activity/{{$activity->id}}/like" method="post">
            @csrf
            <button class="feed-activity-likes {{Auth::user()->hasLiked($activity) ? 'likes-active' : 'null'}}" wire:click="like">{{$activity->likers()->count()}}</button>
        </form>

    </div>

    {{-- COMMENTAIRES --}}
    <div class="feed-activity-reply feed-activity-reply-disable">
        <form action="/communaute/{{$activity->id}}/replies" method="post">
            @csrf
            <label for="reply">Commentaire</label>
            <textarea name="body" id="reply" cols="30" rows="10"></textarea>
            <input type="submit" value="Envoyer">
        </form>
        @foreach($activity->replies as $reply)
        <div class="reply-item">
            <div class="reply-item-top">
                <div class="reply-item-top-img">
                    <img src="{{asset('storage/users/picture/' . $reply->user->picture)}}" alt="">
                </div>
                <span>{{$reply->user->pseudo}} - {{date('j/m/Y', strtotime($reply->created_at))}}</span>
            </div>

            <div class="reply-item-bottom">
                <p>
                    {{$reply->body}}
                </p>
               <span class="reply-item-bottom-form">Répondre</span>

                <div class="reply-item-replies">
                    <form action="/reply/{{$reply->id}}/reply" method="post" class="reply-form-disable">
                        @csrf
                        <label for="reply">Commentaire</label>
                        <textarea name="reply" id="reply" cols="30" rows="10"></textarea>
                        <input type="submit" value="Envoyer">
                    </form>
                    @foreach ($reply->replies as $rep)
                        <div class="reply-bottom-replies">
                            <div class="replies-item">
                                <div class="replies-user">
                                    <div><img src="{{asset('storage/users/picture/' . $rep->user->picture)}}" alt=""></div>
                                    <span>{{$rep->user->pseudo}} - {{date('j/m/Y', strtotime($rep->created_at))}}</span>
                                </div>
                                <p>
                                    {{$rep->body}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
