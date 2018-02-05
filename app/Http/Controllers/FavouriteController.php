<?php

namespace App\Http\Controllers;

use App\Reply;

class FavouriteController extends Controller
{
    /**
     * Create a new FavouriteController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Reply $reply)
    {
        $reply->favourite();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        $reply->unfavourite();
    }
}
