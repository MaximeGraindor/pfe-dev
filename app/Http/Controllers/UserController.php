<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Inline\Element\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::with('games','badges');
        if(request('pseudo')){
            $users->where('pseudo','like', '%'.request('pseudo').'%');
        }

        foreach ($users as $user) {
            $user->following_count = $user->followings->count();
            $user->followers_count = $user->followers->count();
        }

        $users = $users->get();

        return view('pages.users', [
            'currentUser' => null,
            'title' => 'abonnements',
            'users' =>$users,
            'request' => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $user->load('badges');

        $currentGamesList = User::with(['games' => function ($query){
            $query->wherePivot('relation', 'en cours');
        }])
        ->where('id', $user->id)
        ->get();

        $finishGamesList = User::with(['games' => function ($query){
            $query->wherePivot('relation', 'termine');
        }])
        ->where('id', $user->id)
        ->get();

        $wishGamesList = User::with(['games' => function ($query){
            $query->wherePivot('relation', 'envie');
        }])
        ->where('id', $user->id)
        ->get();

        //return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();

        return view('pages.profil', compact('user', 'currentGamesList', 'finishGamesList', 'wishGamesList'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.updateProfil', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::where('id', Auth::user()->id)->first();

        $request->validate([
            'pseudo' => 'unique:users|max:15',
            'picture' => 'image|mimes:jpg,png,jpeg,gif|max:200|dimensions:min_width=100,min_height=100,max_width500,max_height=500',
            'email' => 'unique:users'
        ]);
        if($request->hasFile('picture')){
            $name = $request->picture->hashName();
            $path = Storage::putFileAs('public/users/picture', $request->file('picture'), $name);
            $user->update([
                'picture' => $name,
            ]);
        }

        if($request->pseudo){
            $user->update([
                'pseudo' => $request->pseudo,
            ]);
        }
        if($request->email){
            $user->update([
                'email' => $request->email
            ]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }


    public function changePassword(Request $request)
    {
        return $val = $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['required'],
        ]);

        return User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        //return Auth::logout();

    }
}
