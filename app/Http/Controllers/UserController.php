<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    public function update(EditUser $request)
    {
        $check = $request->check();
        if ($check['check']) {
            session()->flash('flash_message_success', $check['flash']);
            return redirect('/user/');
        } else {
            session()->flash('flash_message_alert', $check['flash']);
            return redirect()->back()->withErrors([
              $check['error']
            ])->withInput();
        }
    }
}
