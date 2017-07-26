<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class MyteamController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user = auth()->user();
        $teams = Team::with('drivers')->where('user_id', $user->id)->get();
        return view('myteams.index', compact('teams'));
    }
    public function create()
    {
    }
    public function store()
    {
    }
    public function edit(Team $team)
    {
    }
    public function update(Team $team)
    {
    }
}
