<?php

namespace App\Http\Controllers;

use App\Round;
use App\Social\FacebookHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedData = (new FacebookHelper())->getTextFeedElements(3);
        //dd($feedData);
        $now = new Carbon();
        $now = $now->subHours(5);
        $round = Round::where([['race_start', '>', $now->toDateTimeString()],['season_id',config('constants.curent_season')]])->orderBy('race_start', 'asc')->first();
        $roundid = $round->id;
        $fp1_start = new Carbon($round->fp1_start);
        $fp1_end = $fp1_start->addMinutes($round->fp1_minutes);
        $fp2_start = new Carbon($round->fp2_start);
        $fp2_end = $fp2_start->addMinutes($round->fp2_minutes);
        $warmup_start = new Carbon($round->warmup_start);
        $warmup_end = $warmup_start->addMinutes($round->warmup_minutes);
        $qual_start = new Carbon($round->qual_start);
        $qual_end = $qual_start->addMinutes($round->qual_minutes);
        $race_start = new Carbon($round->race_start);
        $race_end = $race_start->addMinutes($round->race_minutes);
        $season = [
          'curent' => null,
          'next' => null,
        ];

        $now = new Carbon();

        if ($now->lt($fp1_start)) {
            $season['next']=[
            'session' => 'Round '.$round->number.' - FP1',
            'time' => $now->diffForHumans($fp1_start, true)
          ];
        } elseif ($now->between($fp1_start, $fp1_end)) {
            $season['curent'] = 'Round '.$round->number.' - FP1';
            $season['next']=[
            'session' => 'Round '.$round->number.' - FP2',
            'time' => $now->diffForHumans($fp2_start, true)
          ];
        } elseif ($now->lt($fp2_start)) {
            $season['next']=[
            'session' => 'Round '.$round->number.' - FP2',
            'time' => $now->diffForHumans($fp2_start, true)
          ];
        } elseif ($now->between($fp2_start, $fp2_end)) {
            $season['curent'] = 'Round '.$round->number.' - FP2';
            $season['next']=[
            'session' => 'Round '.$round->number.' - Warmup',
            'time' => $now->diffForHumans($warmup_start, true)
          ];
        } elseif ($now->lt($warmup_start)) {
            $season['next']=[
            'session' => 'Round '.$round->number.' - Warmup',
            'time' => $now->diffForHumans($warmup_start, true)
          ];
        } elseif ($now->between($warmup_start, $warmup_end)) {
            $season['curent'] = 'Round '.$round->number.' - Warmup';
            $season['next']=[
            'session' => 'Round '.$round->number.' - Qualifying',
            'time' => $now->diffForHumans($qual_start, true)
          ];
        } elseif ($now->lt($qual_start)) {
            $season['next']=[
            'session' => 'Round '.$round->number.' - Qualifying',
            'time' => $now->diffForHumans($qual_start, true)
          ];
        } elseif ($now->between($qual_start, $qual_end)) {
            $season['curent'] = 'Round '.$round->number.' - Qualifying';
            $season['next']=[
            'session' => 'Round '.$round->number.' - Race',
            'time' => $now->diffForHumans($race_start, true)
          ];
        } elseif ($now->lt($race_start)) {
            $season['next']=[
            'session' => 'Round '.$round->number.' - Race',
            'time' => $now->diffForHumans($race_start, true)
          ];
        } elseif ($now->between($race_start, $race_end)) {
            $season['curent'] = 'Round '.$round->number.' - Race';
            $season['next']=[
            'session' => 'Round '.($round->number+1).' - FP1',
            'time' => $now->diffForHumans($race_start, true)
          ];
        } else {
            $season['next']=[
            'session' => 'Round '.($round->number+1).' - FP1',
            'time' => $now->diffForHumans($race_start, true)
          ];
        }

        //dd($season);

        return view('index', compact('feedData', 'season', 'roundid'));
    }
}
