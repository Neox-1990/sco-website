Dear {{$input['user']['name']}}

The status of your team {{$input['team']['name']}} has been changed.
The new status is:# {{config('constants.status_names')[$input['team']['status']]}} #.

Kind regards,
Your SCO Administration
