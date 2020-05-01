<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Events\UserUpdateEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('admin.manager.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.manager.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
        'manager_email' => 'email|unique:users,email',
      ]);

        if ($request->has('managerNameChange')) {
            $user->name = $request->input('manager_name');
            $user->save();
            session()->flash('flash_message_success', 'Manager name changed.');
            event(new UserUpdateEvent($user, 'Name changed'));
            return redirect('admin/manager/'.$user->id);
        } elseif ($request->has('managerEmailChange')) {
            $user->email = $request->input('manager_email');
            $user->save();
            session()->flash('flash_message_success', 'Manager email changed.');
            event(new UserUpdateEvent($user, 'Email changed'));
            return redirect('admin/manager/'.$user->id);
        } elseif ($request->has('managerSetPass')) {
            $user->password = Hash::make($request->input('manager_pass'));
            $user->save();
            session()->flash('flash_message_success', 'Manager password changed.');
            event(new UserUpdateEvent($user, 'Password changed'));
            return redirect('admin/manager/'.$user->id);
        } elseif ($request->has('managerDelete')) {
            if ($user->teams->count() > 0) {
                session()->flash('flash_message_alert', 'Manager still has teams.');
                return redirect('admin/manager/'.$user->id);
            } else {
                $user->delete();
                session()->flash('flash_message_success', 'manager deleted.');
                event(new UserUpdateEvent($user, 'Manager deleted'));
                return redirect('admin/manager/');
            }
        } else {
            session()->flash('flash_message_alert', 'Unknown error.');
            return redirect('admin/manager/'.$user->id);
        }
    }
}
