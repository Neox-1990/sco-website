<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function create()
    {
        return view('registration.create');
    }
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
          'email' => 'required|string|email|max:255|unique:users',
          'name' => 'required|string|max:255',
          'password' => 'required|string|min:6|max:255|confirmed'
        ]);

        $user = User::create([
          'email' => request('email'),
          'name' => request('name'),
          'password' => bcrypt(request('password')),
          'isAdmin' => 0
        ]);

        auth()->login($user);
        session()->flash('flash_message_success', 'Thank you for signing up. You are now logged in.');
        return redirect('/');
    }
}
