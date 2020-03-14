<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        if (!auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
          ], 'yes' == request('rememberme', 'no'))) {
            session()->flash('flash_message_alert', 'An error occured');
            return redirect('/login')->withErrors([
            'message' => 'Please check your credentials and try again'
          ])->withInput();
        }
        session()->flash('flash_message_success', 'You successfully logged in. Welcome back');
        return redirect('/login');
    }
    public function destroy()
    {
        auth()->logout();
        session()->flash('flash_message_success', 'You successfully logged out. See you soon.');
        return redirect('/');
    }
}
