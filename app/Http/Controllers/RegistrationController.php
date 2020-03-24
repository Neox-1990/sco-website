<?php

namespace App\Http\Controllers;

use App\User;
use App\Events\SignUpEvent;
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
        $forbiddenPW=[
          '123456',
          '123456789',
          'qwerty',
          '12345678',
          '111111',
          '1234567890',
          '1234567',
          'password',
          '123123',
          '987654321',
          'qwertyuiop',
          'mynoob',
          '123321',
          '666666',
          '18atcskd2w',
          '7777777',
          '1q2w3e4r',
          '654321',
          '555555',
          '3rjs1la7qe',
          'google',
          '1q2w3e4r5t',
          '123qwe',
          'zxcvbnm',
          '1q2w3e',
          'qwertzuiop',
          'qwertz'
        ];
        $this->validate($request, [
          'email' => 'required|string|email|max:255|unique:users',
          'name' => 'required|string|max:255',
          'password' => 'required|string|min:8|max:255|confirmed|not_in:'.implode(',', $forbiddenPW)
        ]);

        if ($this->checkUsername(request('name'))) {
            session()->flash('flash_message_alert', 'Spamaccountprotection');
            \redirect('/');
        }

        $settings = \App\Setting::getSetup();
        if ($settings['registration']=='0') {
            $error = 'Registration is closed!';
            session()->flash('flash_message_alert', 'An error occurred.');
            return back()->withInput()->withErrors($error);
        }

        $user = User::create([
          'email' => request('email'),
          'name' => request('name'),
          'password' => bcrypt(request('password')),
          'isAdmin' => 0
        ]);

        auth()->login($user);
        session()->flash('flash_message_success', 'Thank you for signing up. You are now logged in.<br><b>Please check your emails including the spam folder and see if you received our email!</b>');
        event(new SignUpEvent($user));
        return redirect('/');
    }

    private function checkUsername(String $name)
    {
        $totalLength = \strlen($name);
        $uppercases = \strlen(preg_replace('![^A-Z]+!', '', $name));

        $result = $uppercases < 0.3 * $totalLength || $totalLength == $uppercases;

        return $result;
    }
}
