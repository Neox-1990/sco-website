<?php

namespace App\Http\Controllers;

use App\Round;
use App\Setting;
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
        $feedData = (new FacebookHelper())->getTextFeedElements(intval((Setting::where('key', '=', 'facebookentries')->first())->value));
        //dd($feedData);
        //$testdate = '2017-10-08 14:50:00';
        $roundnumber = Round::where([['season_id',config('constants.curent_season')]])->count();
        //dd($roundnumber);
        $now = new Carbon();

        //dd($now);
        //$now = Carbon::parse($testdate);
        $now->hour = 0;
        $now->minute = 0;
        $now->second = 0;
        $round = Round::where([['race_start', '>', $now->toDateTimeString()],['season_id',config('constants.curent_season')]])->orderBy('race_start', 'asc')->first();
        if ($round != null) {
            $roundid = $round->id;
            $fp1_start = new Carbon($round->fp1_start);
            $fp1_end = new Carbon($round->fp1_start);
            $fp1_end->addMinutes($round->fp1_minutes);
            $fp2_start = new Carbon($round->fp2_start);
            $fp2_end = new Carbon($round->fp2_start);
            $fp2_end->addMinutes($round->fp2_minutes);
            $warmup_start = new Carbon($round->warmup_start);
            $warmup_end = new Carbon($round->warmup_start);
            $warmup_end->addMinutes($round->warmup_minutes);
            $qual_start = new Carbon($round->qual_start);
            $qual_end = new Carbon($round->qual_start);
            $qual_end->addMinutes($round->qual_minutes);
            $race_start = new Carbon($round->race_start);
            $race_end = new Carbon($round->race_start);
            $race_end->addMinutes($round->race_minutes);
            /*dd(
              $fp1_start,
              $fp1_end,
              $fp2_start,
              $fp2_end,
              $warmup_start,
              $warmup_end,
              $qual_start,
              $qual_end,
              $race_start,
              $race_end
            );*/
            $season = [
              'curent' => null,
              'next' => null,
            ];

            $now = new Carbon();
            //$now = Carbon::parse($testdate);

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
                if ($round->number<$roundnumber) {
                    $season['next']=[
                  'session' => 'Round '.($round->number+1).' - FP1',
                  'time' => $now->diffForHumans($race_start, true)
                ];
                } else {
                    $season['next']=[
                  'session' => 'season over',
                  'time' => 'some time'
                ];
                }
            } else {
                if ($round->number<$roundnumber) {
                    $season['next']=[
                'session' => 'Round '.($round->number+1).' - FP1',
                'time' => $now->diffForHumans($race_start, true)
              ];
                } else {
                    $season['next']=[
                'session' => 'season over',
                'time' => 'some time'
              ];
                }
            }
        } else {
            $roundid = null;
            $season = [
              'curent' => null,
              'next' => null,
            ];
            $season['next']=[
              'session' => 'season over',
              'time' => 'some time'
            ];
        }


        //dd($season);
        $showPassword = false;
        $setup = Setting::getSetup();
        if (auth()->check() && $setup['session_password_active'] == 1) {
            if (auth()->user()->teams->where('status', 2)->count()>0 || auth()->user()->isAdmin == 1) {
                $showPassword = true;
            }
        }

        return view('index', compact('feedData', 'season', 'roundid', 'showPassword'));
    }
}
