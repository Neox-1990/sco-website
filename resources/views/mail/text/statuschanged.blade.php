Dear {{$input['user']['name']}}

The status of your team {{$input['team']['name']}} has been changed.
The new status is:# {{config('constants.status_names')[$input['team']['status']]}} #.
@if($input['team']['status']==3)
  To get your Team confirmed, you now have to pay the entryfee of 5 $ via Paypal. You can use .the following link to pay the entryfee: https://www.paypal.me/sportscaropen/5usd . If it doesnt work, you can send the fee to info@sco.coresimracing.com. Be sure to choose the 'Send money to friends and family' option. This way we receive the whole amount without any transaction costs by Paypal.
@endif

Kind regards,
Your SCO Administration
