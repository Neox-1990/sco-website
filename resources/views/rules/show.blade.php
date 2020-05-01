@extends('master.master')

@section('main')

<div class="row mx-0">
  <div class="col-12">
    <div class="p-2" id="rulebook">
      <h1>Rulebook</h1>
      <p><em>Last update: 28th April 2020</em></p>
      <a data-status="closed" class="btn btn-outline-dark m-1" id="openAllRules"><i class="fas fa-list-ol mr-2" aria-hidden="true"></i><span>Open all rules</span></a>
      <hr>
      <h3>1. Introduction</h3>
      <ol class="rulebook-section">
        <li>The Sports Car Open 6 hours of the Glen (or SCO 6 hours of the Glen) is a racing event, which is organised and run by CoRe SimRacing on the iRacing.com Motorsports Simulation service. The event utilises a selection of prototype and grand touring cars in a team-based, multi-class endurance race, held on the Boot layout of the Watkins Glen International circuit.</li>
        <li>These regulations will apply to all test, practice, warm-up, qualifying and race sessions that are hosted by the event administration. By entering the event, all teams and drivers automatically agree to all rules in this document.</li>
        <li>The document may be edited to add, remove, modify or replace rules whenever the event administration deems it to be necessary. All changes made will be in effect immediately unless otherwise specified.</li>
        <li>Participants as well as event administration members and general attentive readers are encouraged to point out loopholes, spelling errors and other mistakes so that they can be closed and corrected respectively. Feedback and improvement suggestions are also welcome.</li>
      </ol>
      <h3>2. Cars and Class Structure</h3>
      <ol class="rulebook-section">
        <li>The event will feature two different classes of cars. Each car class will include the following car models:
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Class</th>
                <th>Abbreviation</th>
                <th>Car(s)</th>
                <th>Ballast / Fuel Cap.</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Prototype</td>
                <td class="badge-P8">P</td>
                <td>HPD ARX-01c</td>
                <td>0 kg / 100%</td>
              </tr>
              <tr>
                <td>Grand Touring </td>
                <td class="badge-GT8">GT</td>
                <td>BMW M8 GTE<br>Ferrari 488 GTE<br>Ford GT 2017<br>Porsche 911 RSR</td>
                <td>0 kg / 100%<br>0 kg / 100%<br>0 kg / 100%<br>0 kg / 100%</td>
              </tr>
            </tbody>
          </table>
        </li>
        <li>The series administration reserves itself to add ballast, change the power output or limit the fuel capacity of any car or car class to balance the cars within a class or to modify the balance between the car classes. Such car adjustments will never be made any later than 3 days before the start of warm-up. Generally, no adjustments will be made, unless the series administration feels that there are overly dominant car models within a class or too small or large performance gaps between car classes.</li>
        <li>Should an iRacing update affect the performance of one or multiple of the cars in the 			championship, the series administration can alter or reset any of the previously allocated 		weight handicaps or fuel capacity restrictions.</li>
      </ol>
      <h3>3. Timetable and Season Schedule</h3>
      <ol class="rulebook-section">
        <li>The schedule for the event, including all session dates, start times and in-sim dates and times of day, is listed below.
          <table class="table table-bordered">
            <tbody>
              @foreach($rounds as $round)
                @php
                  $title = explode('#', $round['combo']);
                @endphp
                <tr>
                  <td colspan="3" class="pt-5">{{$round['number']}}<b class="mx-5">{{$title[0]}}</b>({{$title[1]}})</td>
                </tr>
                <tr>
                  <th>Session</th>
                  <th>SimTime</th>
                  <th>Session Start</th>
                </tr>
                <tr>
                  <td>Free Practice 1 ({{$round['fp1_minutes']}} min)</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['fp1_insimdate']))->format('Y-m-d')}} at {{(Carbon\Carbon::createFromTimeString($round['fp1_insimdate']))->format('H:i a')}} local</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['fp1_start']))->format('d/m/y')}} at {{(Carbon\Carbon::createFromTimeString($round['fp1_start']))->format('H:i')}} UTC</td>
                </tr>
                <tr>
                  <td>Free Practice 2 ({{$round['fp2_minutes']}} min)</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['fp2_insimdate']))->format('Y-m-d')}} at {{(Carbon\Carbon::createFromTimeString($round['fp2_insimdate']))->format('H:i a')}} local</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['fp2_start']))->format('d/m/y')}} at {{(Carbon\Carbon::createFromTimeString($round['fp2_start']))->format('H:i')}} UTC</td>
                </tr>
                <tr>
                  <td>Free Practice 3 ({{$round['fp3_minutes']}} min)</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['fp3_insimdate']))->format('Y-m-d')}} at {{(Carbon\Carbon::createFromTimeString($round['fp3_insimdate']))->format('H:i a')}} local</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['fp3_start']))->format('d/m/y')}} at {{(Carbon\Carbon::createFromTimeString($round['fp3_start']))->format('H:i')}} UTC</td>
                </tr>
                <tr>
                  <td>Warm-Up ({{$round['warmup_minutes']}} min)</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['warmup_insimdate']))->format('Y-m-d')}} at {{(Carbon\Carbon::createFromTimeString($round['warmup_insimdate']))->format('H:i a')}} local</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['warmup_start']))->format('d/m/y')}} at {{(Carbon\Carbon::createFromTimeString($round['warmup_start']))->format('H:i')}} UTC</td>
                </tr>
                <tr>
                  <td>Qualifying ({{$round['qual_minutes']}} min)</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['qual_insimdate']))->format('Y-m-d')}} at {{(Carbon\Carbon::createFromTimeString($round['qual_insimdate']))->format('H:i a')}} local</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['qual_start']))->format('d/m/y')}} at {{(Carbon\Carbon::createFromTimeString($round['qual_start']))->format('H:i')}} UTC</td>
                </tr>
                <tr>
                  <td>Race ({{$round['race_minutes']}} min)</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['race_insimdate']))->format('Y-m-d')}} at {{(Carbon\Carbon::createFromTimeString($round['race_insimdate']))->format('H:i a')}} local</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['race_start']))->format('d/m/y')}} at {{(Carbon\Carbon::createFromTimeString($round['race_start']))->format('H:i')}} UTC</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </li>
        <li>All sessions will be team sessions. Only registered teams and drivers are allowed to take part.</li>
      </ol>
      <h3>4. Entry Conditions and Requirements</h3>
      <ol class="rulebook-section">
        <li>To be able to enter, every team must have a team manager as well as a driver line-up consisting of at least 2 but no more than 6 drivers. Team managers as well as other non-driving team representatives don’t have to fulfil any of the driver requirements.</li>
        <li>All driving team members, meaning everyone listed on a team's driver line-up, must meet the 		minimum requirements for their team's car class at the point of sign-up. The Road Safety 		Rating and Road iRating requirements for each car class are listed below.
          <table class="table table-bordered">
            <tr>
              <th>Car Clas</th>
              <th>Minimum Road SR</th>
              <th>Minimum Road iRating</th>
            </tr>
            <tr>
              <td>Prototype</td>
              <td>C 4.00 or higher</td>
              <td>2500 or higher</td>
            </tr>
            <tr>
              <td>Grand Touring</td>
              <td>D 4.00 or higher</td>
              <td>2500 or higher</td>
            </tr>
          </table>
        </li>
        <li>The series administration reserves itself the right to prevent teams, team managers and 		drivers from entering the series if it's deemed to be necessary from their point of view.
          <ol>
            <li>Decisions like these will typically be made based on a team's, team manager's or 				driver's conduct in other leagues as well as official iRacing series in the weeks and 			months leading up to the entry request, though other reasons may also factor into the 			decision.</li>
            <li>The decision to reject the entry of a team, team manager or driver will be made on a 			case-by-case basis for each season, meaning that teams, team managers and drivers 			who are prevented from entering may attempt to enter the series again in future. </li>
            <li>The series administrations' decision to reject the entry of any team, team manager or 			driver into the current season is final and cannot be appealed. </li>
          </ol>
        </li>
      </ol>
      <h3>5. Entry Procedure</h3>
      <ol class="rulebook-section">
        <li>The sign-ups for all teams will open on Friday, May 1st, 2020 at 16:00 UTC. From this point onwards, managers will be able to create teams on the series website.
          <ol>
            <li>Please note that no team will be allowed to enter more than 2 cars into any of the 			classes. The maximum number of available spaces per car class can be seen below:
              <ul>
                <li>Prototype (P): 20 cars maximum</li>
                <li>Grand Touring (GT): 30 cars maximum</li>
                <li>Total Car Count: 48 cars (regardless of class limits)</li>
              </ul>
            </li>
            <li>The series administration can grant exceptions to the 2 car limit per class per team 			upon receiving a request from the team manager(s) of the affected entries. These 			requests will be assessed on a case-by-case basis.</li>
            </ol>
        </li>
        <li>The entry deadline for all entrants will be on Sunday, May 24th, 2020 at 23:59 UTC.
          <ol>
            <li>All teams that have entered the event by the deadline listed in 5.b must pay the entry fee of $9 per entered car by the deadline listed in 5.b.</li>
          </ol>
        </li>
        <li>Every team that's created during a season will have a team status assigned to it. There are a 		total of 5 different statuses: 'Pending', 'Reviewed', 'Waiting List', 'Qualified' and 'Confirmed'.
          <ol>
            <li>Newly created teams will have their status set to ‘Pending’ automatically. Once the series administration has checked everything about said newly created team, the team’s status will be changed to ‘Qualified’.</li>
            <li>Once any team with the 'Qualified' status has paid the entry fee of $9 in its entirety, 			their team's status will be changed to 'Confirmed'.</li>
            <li>The 'Waiting List' status will be reserved for teams on the waiting list for their 				respective class.</li>
          </ol>
        </li>
        <li>After a team has been created, a team manager will only be allowed to edit the driver line-up 		of his teams. Should he wish to edit further details, he must contact the series 				administration.
          <ol>
            <li>Driver line-ups may not be edited any later than 24 hours before the start of FP1 ahead of each round.</li>
            <li>Should a driver, who was added to a team's line-up after the deadline actually compete 			in the race, the team in question will receive a 30 second stop and hold penalty once 			said driver has taken over the car.</li>
          </ol>
        </li>
        <li>All teams, that have entered a car class with multiple car models, must declare their final car selection no later than 24 hours before the start of FP1.</li>
        <li>Any team, that withdraws from the event, will not be refunded their entry fee.</li>
      </ol>
      <h3>6. Paint Schemes</h3>
      <ol class="rulebook-section">
        <li>All participating teams are required to submit custom paint schemes.</li>
        <li>When submitting a paint scheme, every team has to make sure to include information like the 		team name, car number and car model. All paint scheme files should be named as shown 		below:
          <pre>car_team_XXXXX.tga	(XXXXX should be your team's ID)</pre>
        </li>
        <li>All custom paint schemes that are received by the series administration will be reviewed and 		must be in compliance with the 5 rules listed below.
          <ol>
            <li>Teams must provide written permission from the companies involved, to be allowed to 			run sponsors' logos on their car.</li>
            <li>Logos of products that compete with iRacing (such as the Gran Turismo and Forza 			frachises for example) will not be permitted. The same is the case for logos of 				automotive brands that compete with the brand of car that they're displayed on.</li>
            <li>It will be strictly forbidden for paint schemes to directly or indirectly promote tobacco 			or any products that are restricted to minors by law (e.g.: alcohol, knives, etc.). They 			must not include any kind of political message.</li>
            <li>No team liveries will be allowed to run 'parodies' of logos or other intellectual property.</li>
            <li>Any logo already available in the iRacing Paint Shop may be used.</li>
          </ol>
        </li>
        <li>To submit a custom paint file, it must be sent to <a href="mailto:info@sportscaropen.eu">info@sportscaropen.eu</a> at least 24 hours 		before the start of first practice for it to be included in the paints pack for the event.
          <ol><li>Please make sure to include your team’s car number, team name and car class in the 			subject line of the e-mail when sending the paint file. You may also send multiple paint 			files in a single mail, but please make it clear which paint is for which car in the mail 			itself.</li></ol>
        </li>
        <li>Custom number panels and class stickers will be used and must be included on the paint 		file that is sent to the series administration.
          <ol>
            <li>All of these paints should be saved as TARGA (.tga) files with a 24 bits/pixel resolution 			and RLE compression enabled.</li>
            <li>Teams, who also wish to make use of custom spec maps, must ensure that none of the custom number panels, the class stickers or other mandatory paint elements are made overly reflective or have their appearance changed in other ways that makes them harder to read.</li>
          </ol>
        </li>
        <li>The series administration will check whether every team's paint is in compliance with rules 		6.c.1 to 6.c.5 and will also check for the car and class appropriate number panels and 			sunstrip overlay. If there are issues with any submitted paint, the series administration will 		respond via e-mail.</li>
        <li>Custom paint schemes for any single driver session, like both free practice sessions and any 		eventual test session do not have to be sent in and will not be accepted or included in any 		kind of skin pack.</li>
        <li>Driver suits and helmet paints may also be submitted.</li>
      </ol>
      <h3>8. Warm-up</h3>
      <ol class="rulebook-section">
        <li>Warm-up is the session in which all teams and drivers will be able to connect to the race 		server to prepare and drive practice laps ahead of qualifying and the race session itself.</li>
        <li>Teams will be required to register with the correct team and car, meaning that the team ID, 		team name, car number and car model have to match the information listed on the series’ 		entry list.</li>
        <li>Should a team join with the incorrect team ID or car number, they will be allowed to 			participate in the remaining sessions, but will receive a drive-through penalty within the first 		20 minutes of the race.
          <ol><li>No penalties will be given to teams who had their car number taken away by a team 			that registered before them.</li></ol>
        </li>
        <li>Any team that registers with the wrong car model or even registers with multiple teams will 		be disqualified from the event and refused entry to the qualifying and race sessions.</li>
      </ol>
      <h3>9. Qualifying</h3>
      <ol class="rulebook-section">
        <li>Qualifying will be held in a 45 minute long open qualifying session, which will be split into two 20 minute long segments with a 5 minute long break between both of these segments.
          <ol>
            <li>During the first 20 minute long segment, starting at the start of the qualifying session and ending at the 20 minute mark, only Grand Touring (GT) teams may go on-track and qualify.</li>
            <li>During the second 20 minute long segment, starting at the 25 minute mark and running until the end of the qualifying session, only Prototype (P) teams may go on-track and qualify.</li>
          </ol>
        </li>
        <li>Prototype (P) teams may not leave the pit lane before the start of their class' qualifying segment. The signal that teams may leave the pit lane to go on-track and qualify will be given by the event administration via the in-game chat.</li>
        <li>Grand Touring (GT) teams may not start new laps after the end of their class' qualifying segment. The signal that teams may not start new laps and must return to the pit lane will be given by the event administration via the in-game chat.</li>
        <li>Any member of a team's driver roster will be allowed to drive the car during their car class' qualifying segment.</li>
        <li>During qualifying, all drivers on-track must be aware of their surroundings at all times. Any team found to be interfering with another team's qualifying laps in any way, may be penalised if the incident is reported to the series administration.</li>
        <li>The driver, who sets a team's fastest time during qualifying, is not required to start the car, but must complete at least 1 full lap during the race. This lap cannot start or end in the pit lane.</li>
        <li>Teams, who are observed to have left the pit lane outside their car class' qualifying segment by another team or the series administration, will receive a drive-through penalty after the start of the race.</li>
        <li>Teams, who do not set a time during qualifying must also start the race from the back of their car class. Should this be the case for multiple teams, they will be gridded in order of their fastest warm-up session times.</li>
        <li>The series administration may not allow a team or driver to take the start, if they’re deemed to be a potential danger to other cars on-track during the race.</li>
      </ol>
      <h3>10. Race</h3>
      <ol class="rulebook-section">
        <li>All races will utilise the standard rolling start procedure the iRacing software provides with 		the following alterations:
          <ol>
            <li>The class leader of the supporting GT class should keep a gap of about 5 seconds to the last P class car ahead of them on the pace lap.</li>
            <li> All cars and classes, meaning P and GT must ignore the "green flag" as displayed by iRacing and must remain in their grid formation while also keeping to the pace car speed. Frequent accelerating and braking as well as deviating too far from the pace car speed may be penalised.</li>
            <li>Only the leader of each class will be allowed to initiate the start of their categories’ 			race by starting to accelerate away from the field in the “starting zone”. Once he has 			done so, all cars of that class will be free to race. All classes will be subject to this 			procedure.</li>
            <li>Images of the exact beginning and end points of this “starting zone” will be part of the 			drivers’ briefing, which will be published before the first free practice session.</li>
            <li>Teams that start from pit lane must line up at pit exit in a line. They will not be allowed to leave the lane until the race administration declares the pit exit open once the last GT car has passed the first turn. Leaving the pit lane early will result in a 15 second stop & hold penalty.</li>
          </ol>
        </li>
        <li>During the race itself, no driver will be allowed to complete more than 70% of a team’s total number of completed laps.
          <ol>
            <li>Fractional amounts of laps will always be rounded to the closest full number.
            </li>
            <li>All laps beyond the 70% limit will be deducted from a team’s total number of completed laps.</li>
          </ol>
        </li>
        <li>Additionally, to make sure people don’t take too many liberties with the track limits, an incident limit will be enforced.
          <ol>
            <li>The incident limit will be set at 79 incident points.</li>
            <li>A team will be given a drive-through penalty once they’ve exceeded the incident limit by 1 incident point.</li>
            <li>A team will be given a 15 second stop and hold penalty once they’ve exceeded the incident limit by 31 incident points.</li>
            <li>The duration of the stop and hold penalty given will double at every 30 incident point milestone after that, meaning that a team will receive a 30 second stop and hold penalty once they’ve exceeded the incident limit by 61 points, a 60 second stop and hold penalty once they’ve exceeded the incident limit by 91 points and so on.</li>
          </ol>
        </li>
      </ol>
      <h3>11. General Driving Conduct</h3>
      <ol class="rulebook-section">
        <li>All drivers must pass in a safe manner and respect their opponents. Both drivers must also 		take into account leaving room for lag. This applies to lapping manoeuvres just as much as to 		overtakes for race positions.</li>
        <li>Drivers will not be allowed to block and must choose their line ahead of a corner without 		moving under braking to cover off any attacks from their opponents (blocking meaning that 		you're reacting to line changes of the car behind to fend off any attempts of the car behind to 		get alongside).</li>
        <li>As this is a series with multiple car classes on-track at the same time, all of which have 		varying top speeds, braking performance and cornering capabilities, every driver is asked to 		take care of the previous two rules as well as always acting with common sense.
          <ol>
            <li>Lapping cars must at all times be aware of the fact that they are the ones who have to 			make the passes since they're the faster cars. They can't expect to always have the 			racing line when doing so and will have to be just that little bit more cautious every 			now and then to make sure they they don't ruin another team's race along with their 			own.</li>
            <li>On the other side, all lapped drivers must make sure to always behave in a predictable 			manner. They should stick to the racing line where needed, but that doesn't at all mean 			that they can't cooperate should they find themselves in a situation where moving 			slightly off-line or braking slightly earlier will help a lapping car get by just that little 			bit sooner and faster, helping both cars in the process by losing less time on the race 			track.</li>
          </ol>
        </li>
        <li>Should someone go off the track, they have to make sure that the track is clear before 			rejoining the racing surface. Dangerous track re-entries or even causing an incident while you 		try to rejoin will result in penalties when reported to the series administration.</li>
        <li>Under a waved yellow flag, please make sure to pay attention to the road ahead as well as 		any potentially stationary or slowly moving cars next to or on the race track itself.</li>
      </ol>
      <h3>12. Race Stoppages</h3>
      <ol class="rulebook-section">
        <li>If the iRacing service fails during the race resulting in drivers being unable to join or stay connected to the racing server of if the server becomes unstable enough to potentially cause problems for drivers, the race will be stopped. Should this happen, the event administration will announce the race stoppage by announcing the "red flag" status via the in-game chat (if the session is still accessible) and on the series Discord server.</li>
        <li>The event administration will decide on how to treat the race stoppage, depending on how much of the scheduled race time passed since the start of the race and also on whether there's still usable timing data left over to create a race result.</li>
        <li>Whether an abandoned race that didn't run for at least 50% of its advertised duration is rescheduled, will be decided by the event administration based on the feedback from all teams competing in the current SCO event.</li>
      </ol>
      <h3>13. Protests</h3>
      <ol class="rulebook-section">
        <li>Teams may protest any incidents they were involved in or affected by. The only way to do so 		is by filing a protest via the series protest form at any point after the start of the race to a 		maximum of 2 hours after the event ending.
          <ol>
            <li>Incidents will be investigated at the earliest opportunity and will be judged by at least 			two different series administration members.</li>
            <li>The series administration will attempt to reach a verdict as quickly as possible, to 			ensure that as many of the protests as possible will result in the guilty parties being 			penalised during the race.</li>
            <li>Should the series administration not be able to reach a verdict during the race because 			there is too little time left in the race, the penalty (if applicable) will be converted to 			a post-race penalty.</li>
            <li>The verdicts of all post-race investigations will be published within 48 hours of the 			event’s conclusion.</li>
            <li>All protests and verdicts will be tracked in a spreadsheet and published once the results 			have been declared official.</li>
          </ol>
        </li>
        <li>Frivolous protests will be ignored. Should a team be found to repeatedly file such protests, 		they may be warned or even penalised for their actions.</li>
        <li>The start of every race will automatically be reviewed by the series administration to check 		whether there were jump starts or any other significant incidents.</li>
        <li>All protest verdicts are judgements of fact and cannot be appealed under any circumstances.</li>
      </ol>
      <h3>14. Penalties</h3>
      <ol class="rulebook-section">
        <li>There are several types of penalties that can be assigned following an investigation by the 		series administration. The list of possible penalties can be found below.
          <ul class="list-group my-3">
            <li class="list-group-item mt-0">Warning</li>
            <li class="list-group-item mt-0">Time Penalty (minimum of 5 seconds)</li>
            <li class="list-group-item mt-0">Drive-Through Penalty</li>
            <li class="list-group-item mt-0">Stop & Hold Penalty (minimum of 5 seconds)</li>
            <li class="list-group-item mt-0">Lap Deductions</li>
            <li class="list-group-item mt-0">Disqualifications</li>
            <li class="list-group-item mt-0">Exclusions from Multiple Events (may be assigned to a team or driver)</li>
          </ul>
          <ol>
            <li>When serving a drive-through penalty, the affected team must drive through the pit 			lane without making a pit stop. Violating this rule will result in the team being given 			another drive-through penalty.</li>
            <li>Any team receiving a drive-through penalty must serve said drive-through penalty within 10 minutes of it being issued. Failure to serve a drive-through penalty within the prescribed amount of time will result in the affected team being awarded a 15 second stop & hold penalty.</li>
            <li>Teams may combine stop & hold penalties with regular pit stops. If they choose to do so, iRacing will automatically add 25 seconds to the penalty time assigned to them by the series administration.</li>
          </ol>
        </li>
        <li>Repeat offenders will receive harsher penalties, should they be penalised for the same type 		of misbehaviour multiple times.</li>
        <li>Penalties can affect teams as well as drivers individually, meaning a team can just as easily be 		excluded from competition as individual drivers, depending on the severity of the rule 			violations they committed. </li>
        <li>The series administration also reserves itself the right to issue a team with a further penalty for the next event of the season, if a team does not serve a penalty they've been given during the race.</li>
        <li>All warnings and penalties that are issued during or after an event will be posted in the in-game chat and the list of submitted protests which will be linked in the #race-control channel of the series Discord and in the event briefing.</li>
      </ol>
      <h3>15. Classification</h3>
      <ol class="rulebook-section">
        <li>All teams, who start a race, fulfil the maximum driver lap share requirements and cover at least 75% of their respective class leader's driven distance, will be classified in their achieved overall race position in the official results.</li>
      </ol>
      <h3>16. In-Game Session Settings</h3>
      <ol class="rulebook-section">
        <li>This section of the rulebook lists all in-game session settings that have not been brought up at 		an earlier point in this document.
          <ol>
            <li>All sessions will be hosted on the NL-Amsterdam server farm.</li>
            <li>Dynamic weather will be used in all sessions.</li>
            <li>The track state will be always be set to “automatically generated” at the beginning of 			a session and will carry over to the next sessions on race day. Marbles will be removed 			between sessions.</li>
            <li>Full course cautions as well as fast repairs will be disabled.</li>
            <li>All driving aids with the exceptions of clutch assists will be disallowed.</li>
            <li>The sim date and time of day will be carried over from session to session on race day. 			Roughly 5 minutes of in-game time will pass on each session transition.</li>
            <li>The Sun Acceleration Multiplier will be to set '1x' at all times.</li>
            <li>All cars in a class will be gridded together, meaning that cars from faster classes, that do not have a qualifying time, will receive a grid slot at the end of their class' field instead of the whole field.</li>
            <li>The Qualifying Conduct Scrutiny will be set to "Off" for all race day sessions.</li>
          </ol>
        </li>
      </ol>
      <h3>17. Contact Details and Communication</h3>
      <ol class="rulebook-section">
        <li>Should any questions arise, team managers, drivers and other persons can contact the series administration using the e-mail address below. Responses to any questions about the regulations, team line-up changes or other inquiries will be sent within 24 hours of us receiving the original message.
          <pre>Contact E-Mail Address: <a href="mailto:info@sportscaropen.eu">info@sportscaropen.eu</a></pre>
        </li>
        <li>The series administration will also use a Discord server during events, but can also be 			contacted there at all other points. The permanent invite link to the Sports Car Open Discord 		can be found below:  <a href="https://discord.gg/ShfkyTe" class="text-center d-block">https://discord.gg/ShfkyTe</a>
          <ol>
            <li>The series administration advises all team managers or team members that are in contact with drivers on-track to be online on the SCO Discord during races. Generally, instructions will be given both in-game as well as on Discord, but there's always a chance that in the case of server issues, series administration members will be affected too, meaning they'll no longer be able to give instructions in-game and must resort to Discord only.</li>
          </ol>
        </li>
        <li>The use of the text and voice chat during qualifying and race sessions is forbidden. While 		occasional and accidental violations will not have any negative consequences, repeated 		offences will lead to penalties, especially if the message is intended to call out or insult 		another participant or series administration member.</li>
      </ol>
    </div>
  </div>
</div>

@endsection
@section('additionalFooter')
<script type="text/javascript">
  $(function(){
    $('.rulebook-section').prev().append('<i class="far fa-plus-square ml-3" aria-hidden="true"></i>').on('click', toggleRule);
    $('#openAllRules').on('click', openAllRules);
  });

  function toggleRule(){
    $(this).next().slideToggle();
    $(this).find('i').first().toggleClass('fa-plus-square').toggleClass('fa-minus-square');
  }
  function openAllRules(){
    if($(this).attr('data-status')=='closed'){
      $('.rulebook-section').slideDown().prev().find('i').removeClass('fa-plus-square').addClass('fa-minus-square');
      $(this).attr('data-status', 'open');
      $(this).find('span').first().html('Close all rules');
    }else{
      $('.rulebook-section').slideUp().prev().find('i').addClass('fa-plus-square').removeClass('fa-minus-square');
      $(this).attr('data-status', 'closed');
      $(this).find('span').first().html('Open all rules');
    }

  }
</script>
@endsection
