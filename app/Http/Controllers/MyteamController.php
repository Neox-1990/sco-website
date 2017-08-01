<?php

namespace App\Http\Controllers;

use App\Team;
use App\Http\Requests\CreateTeam;

//use Illuminate\Http\Request;

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
        return view('myteams.create');
    }
    public function store(CreateTeam $request)
    {
        dd($request);
    }
    public function edit(Team $team)
    {
    }
    public function update(Team $team)
    {
    }
}
