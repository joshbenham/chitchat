<?php

namespace App\Http\Controllers;

use App\Thread;

class LockedThreadController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function store(Thread $thread)
    {
        $thread->update(['locked' => true]);
    }

    /**
     * Delete a resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        $thread->update(['locked' => false]);
    }
}
