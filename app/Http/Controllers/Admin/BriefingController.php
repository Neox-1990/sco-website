<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Mail\Briefing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BriefingController extends Controller
{
    //
    public function edit()
    {
        return view('admin.briefing.edit');
    }

    public function send(Request $request)
    {
        $subject = $request->input('mail_subject');
        $salutation = $request->input('mail_salutation');
        $text = $request->input('mail_text');
        $link = $request->input('mail_link');
        $farewell = $request->input('mail_farewell');

        $input = compact('subject', 'salutation', 'text', 'link', 'farewell');
        $manager = User::whereHas('teams', function ($query) {
            $query->where([['status', '=', '4'],['season_id', '=', config('constants.current_season')]]);
        })->pluck('email')->toArray();
        array_push($manager, 'kontakt@ronaldg.de');
        foreach ($manager as $mail) {
            Mail::to($mail)->send(new Briefing($input));
        }

        dd($input);
        //return view('admin.briefing.send');
    }
}
