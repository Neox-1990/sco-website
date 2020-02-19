<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Round;
use App\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    //
    public function index()
    {
        $seasons = Season::get();
        return view('admin.seasons.index', compact('seasons'));
    }

    public function edit(Season $season)
    {
        $rounds = Round::where('season_id', $season->id)->get()->sortBy('number');
        return view('admin.seasons.edit', compact('season', 'rounds'));
    }

    public function update(Request $request, Season $season)
    {
        $season->name = $request->input('season_name');
        $season->start = $request->input('season_start');
        $season->end = $request->input('season_end');
        if ($season->save()) {
            session()->flash('flash_message_success', 'Season updated');
            return redirect('admin/season/edit/'.$season->id);
        } else {
            session()->flash('flash_message_alert', 'Season update failed');
            return redirect('admin/season/edit/'.$season->id);
        }
    }

    public function create()
    {
        return view('admin.seasons.create');
    }

    public function store(Request $request)
    {
        $season = new Season;
        $season->name = $request->input('season_name');
        $season->start = $request->input('season_start');
        $season->end = $request->input('season_end');
        if ($season->save()) {
            session()->flash('flash_message_success', 'Season updated');
            return redirect('admin/season/');
        } else {
            session()->flash('flash_message_alert', 'Season update failed');
            return redirect('admin/season/');
        }
    }

    public function delete(Request $request, Season $season)
    {
        $rounds = $season->rounds;
        $rounds->each(function ($item, $key) {
            $item->delete();
        });
        
        if ($season->delete()) {
            session()->flash('flash_message_success', 'Season deleted');
            return redirect('admin/season');
        } else {
            session()->flash('flash_message_alert', 'Season deleting failed');
            return redirect('admin/season');
        }
    }

    public function roundEdit(Season $season, Round $round)
    {
        return view('admin.seasons.editRound', compact('season', 'round'));
    }

    public function roundUpdate(Request $request, Season $season, Round $round)
    {
        $round->number = $request->input('round_number');
        $round->combo = implode('#', [
        $request->input('round_name'),
        $request->input('round_track'),
        $request->input('round_time')
      ]);
        $round->fp1_start = $request->input('round_fp1_start');
        $round->fp1_insimdate = $request->input('round_fp1_insimdate');
        $round->fp1_minutes = $request->input('round_fp1_min');
        $round->fp2_start = $request->input('round_fp2_start');
        $round->fp2_insimdate = $request->input('round_fp2_insimdate');
        $round->fp2_minutes = $request->input('round_fp2_min');
        $round->fp3_start = $request->input('round_fp3_start');
        $round->fp3_insimdate = $request->input('round_fp3_insimdate');
        $round->fp3_minutes = $request->input('round_fp3_min');
        $round->warmup_start = $request->input('round_warmup_start');
        $round->warmup_insimdate = $request->input('round_warmup_insimdate');
        $round->warmup_minutes = $request->input('round_warmup_min');
        $round->qual_start = $request->input('round_qual_start');
        $round->qual_insimdate = $request->input('round_qual_insimdate');
        $round->qual_minutes = $request->input('round_qual_min');
        $round->race_start = $request->input('round_race_start');
        $round->race_insimdate = $request->input('round_race_insimdate');
        $round->race_minutes = empty($request->input('round_race_min'))?null:$request->input('round_race_min');
        $round->race_laps = empty($request->input('round_race_laps'))?null:$request->input('round_race_laps');

        if ($round->save()) {
            session()->flash('flash_message_success', 'Round updated');
            return redirect('admin/season/edit/'.$season->id);
        } else {
            session()->flash('flash_message_alert', 'Round update failed');
            return redirect('admin/season/edit/'.$season->id.'/editRound/'.$round->id);
        }
    }

    public function roundCreate(Season $season)
    {
        return view('admin.seasons.createRound', compact('season'));
    }

    public function roundStore(Request $request, Season $season)
    {
        $round = new Round;
        $round->season_id = $season->id;
        $round->number = $request->input('round_number');
        $round->combo = implode('#', [
      $request->input('round_name'),
      $request->input('round_track'),
      $request->input('round_time')
    ]);
        $round->fp1_start = $request->input('round_fp1_start');
        $round->fp1_insimdate = $request->input('round_fp1_insimdate');
        $round->fp1_minutes = $request->input('round_fp1_min');
        $round->fp2_start = $request->input('round_fp2_start');
        $round->fp2_insimdate = $request->input('round_fp2_insimdate');
        $round->fp2_minutes = $request->input('round_fp2_min');
        $round->fp3_start = $request->input('round_fp3_start');
        $round->fp3_insimdate = $request->input('round_fp3_insimdate');
        $round->fp3_minutes = $request->input('round_fp3_min');
        $round->warmup_start = $request->input('round_warmup_start');
        $round->warmup_insimdate = $request->input('round_warmup_insimdate');
        $round->warmup_minutes = $request->input('round_warmup_min');
        $round->qual_start = $request->input('round_qual_start');
        $round->qual_insimdate = $request->input('round_qual_insimdate');
        $round->qual_minutes = $request->input('round_qual_min');
        $round->race_start = $request->input('round_race_start');
        $round->race_insimdate = $request->input('round_race_insimdate');
        $round->race_minutes = empty($request->input('round_race_min'))?null:$request->input('round_race_min');
        $round->race_laps = empty($request->input('round_race_laps'))?null:$request->input('round_race_laps');

        if ($round->save()) {
            session()->flash('flash_message_success', 'Round created');
            return redirect('admin/season/edit/'.$season->id);
        } else {
            session()->flash('flash_message_alert', 'Round creation failed');
            return redirect('admin/season/edit/'.$season->id);
        }
    }

    public function roundDelete(Request $request, Season $season, Round $round)
    {
        if ($round->delete()) {
            session()->flash('flash_message_success', 'Round deleted');
            return redirect('admin/season/edit/'.$season->id);
        } else {
            session()->flash('flash_message_alert', 'Round deleting failed');
            return redirect('admin/season/edit/'.$season->id);
        }
    }
}
