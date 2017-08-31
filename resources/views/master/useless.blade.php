<?php
use Carbon\Carbon;

$items = [
  "The 24 hours of LeMons was created by former Le Mans class and overall victors, who were dissatisfied with the lack of citrus fruit involved in the French endurance classic.",
  "The rear wing, a key component of many modern racing cars, was dreamt up by American teenager Jim Smith in 1966 when trying to rice up his 50hp VW Beetle.",
  "Up until the early 1980s, full wet tyres had the same smooth surface as slicks and simply had water poured over them before being mounted on the car in a pit stop.",
  "After the split, CART considered switching to running ovals in a clockwise direction to differentiate themselves from the newly created Indy Racing League.",
  "Back in the days of Super Touring, the BTCC tried to force all manufacturers into building racing cars that could also be used as minicabs in an effort to stop them from fielding overly specialised cars that had few things in common with their road-going counterparts.",
  "The idea for racing to utilise a rubber road surface with cars running solid tyres was quickly shelved once it was calculated that the track would need to be resurfaced at least 3 times during each race.",
];

$now = new Carbon;
$motd = $items[$now->format('z')%sizeof($items)];
 ?>

 <div class="card mt-md-3 mt-lg-0 mb-3">
   <div class="card-header text-center">
     <h5>Useless fake message of the day</h5>
   </div>
   <div class="card-body useless-card-body">
     <p><i>"{{$motd}}"</i></p>
   </div>
 </div>
