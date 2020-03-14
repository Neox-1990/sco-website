<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Invite;
use App\User;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    //
    public function index()
    {
        $managers = User::get();
        $open_invites = Invite::where([['season_id', config('constants.current_season')],['used', null]])->with('user')->get();
        $used_invites = Invite::where([['season_id', config('constants.current_season')],['used', '<>', null]])->with('user')->get();

        return view('admin.invites.index', compact('managers', 'open_invites', 'used_invites'));
    }

    public function process(Request $request)
    {
        if ($request->has('add')) {
            $invite = new Invite;
            $invite->season_id = config('constants.current_season');
            $invite->user_id = $request->input('inviteManager');
            if ($invite->save()) {
                session()->flash('flash_message_success', 'Invite added');
                return redirect('admin/invites');
            } else {
                session()->flash('flash_message_alert', 'Invite failed');
                return redirect('admin/invites');
            }
        }

        if ($request->has('delete_invite')) {
            $invite = Invite::where('id', $request->input('id'))->delete();
            session()->flash('flash_message_success', 'Invite deleted');
            return redirect('admin/invites');
        }
    }
}
