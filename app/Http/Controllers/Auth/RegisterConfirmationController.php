<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class RegisterConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            User::where('confirmation_token', request('token'))
            ->firstOrFail()
            ->confirm();
        } catch (\Exception $e) {
            return redirect(route('threads'))
                ->with('flash', 'Unknown token.');
        }

        return redirect(route('threads'))
            ->with('flash', 'Your account is now confirmed! You may post to the forum.');
    }
}
