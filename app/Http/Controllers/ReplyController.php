<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Reply;
use Illuminate\Http\Request;
use App\Events\FollowsNotification;
use App\Events\FollowsNotifications;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Activity $activity)
    {
        $activity->replies()->create([
            'body' => $request->reply,
            'user_id' => Auth::user()->id
            ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        //
    }

    public function replyToReply(Request $request, Reply $reply)
    {
        $reply->replies()->create([
            'body' => $request->reply,
            'user_id' => Auth::user()->id
            ]);

        return redirect()->back();
    }
}
