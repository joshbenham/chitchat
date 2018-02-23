<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Trending;

class SearchController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Trending $trending
     * @return \Illuminate\Http\Response
     */
    public function show(Trending $trending)
    {
        $search = request('q');

        $threads = Thread::search($search)->paginate(25);

        if (request()->expectsJson()) {
            return $threads;
        }

        return view('thread.index', [
            'threads' => $threads,
            'trending' => $trending->get()
        ]);
    }
}
