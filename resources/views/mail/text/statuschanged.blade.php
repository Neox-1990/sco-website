Dear {{$input['user']['name']}}

The status of your team {{$input['team']['name']}} has been changed.
The new status is:# {{config('constants.status_names')[$input['team']['status']]}} #.
@if($input['team']['status']==3)
  Use the following link to pay the entryfee: https://www.paypal.me/sportscaropen/8usd 
@endif

Kind regards,
Your SCO Administration
