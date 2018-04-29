@extends('master.master')

@section('main')

<div class="row">
  <div class="col-12">
    <div class="p-2" id="rulebook">
      <h1>Rulebook</h1>
      <a data-status="closed" class="btn btn-outline-dark m-1" id="openAllRules"><i class="fa fa-list-ol mr-2" aria-hidden="true"></i><span>Open all rules</span></a>
      <hr>
      <h3>1. Introduction</h3>
      <ol class="rulebook-section">
        <li>The Sports Car Open Road America 500 is an endurance racing event, which organised and run by CoRe SimRacing on the iRacing.com Motorsports Simulation service. The event will utilise a selection of prototype and grand touring cars in a team-based, multiclass race running on the Full Course layout of Road America.</li>
        <li>While racing is obviously about competition and trying to achieve the best possible results, we would like to not lose the fun factor, since at the end of the day, it’s still the top priority.</li>
        <li>We also expect all drivers and team representatives to treat each other as well as members of the event administration with respect at all times.</li>
        <li>We are open to suggestions and constructive criticism as well as ideas and other things that contribute to improving our events in general.</li>
      </ol>
      <h3>2. Cars and Class Structure</h3>
      <ol class="rulebook-section">
        <li>The event will feature three different classes of cars. Each car class will include the following car models:
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
                <td>Daytona Prototype</td>
                <td class="badge-DP">DP</td>
                <td>Corvette C7 DP</td>
                <td>0 kg / 100%<br>0 kg / 100%</td>
              </tr>
              <tr>
                <td>Grand Touring</td>
                <td class="badge-GT">GT</td>
                <td>Audi R8 LMS	GT3<br>BMW Z4 GT3<br>Ferrari 488 GT3<br>Mercedes-Benz AMG GT3</td>
                <td>0 kg / 100%<br>0 kg / 100%<br>0 kg / 100%<br>0 kg / 100%</td>
              </tr>
              <tr>
                <td>Cup Challenge</td>
                <td class="badge-CC">CC</td>
                <td>Porsche 911 GT3 Cup</td>
                <td>0 kg / 75%</td>
              </tr>
            </tbody>
          </table>
        </li>
        <li>The event administration reserves itself the right to add ballast or limit the fuel capacity of any car or car class to balance the cars within a class or to modify the balance between the car classes. Such car adjustments will never be made any later than 3 days before the start of warm-up. Generally, no adjustments will be made, unless the event administration feels that there are overly dominant car models within a class or too small or large performance gaps between car classes.</li>
        <li>Should an iRacing update affect the performance of one or multiple of the cars in the championship, the event administration can alter or reset any of the previously allocated weight handicaps or fuel capacity restrictions.</li>
      </ol>
      <h3>3. Timetable and Season Schedule</h3>
      <ol class="rulebook-section">
        <li>The event sessions will run on the following days:
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Event</th>
                <th>Venue / Track Layout</th>
                <th>Time of Day</th>
                <th>Session Dates</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Sports Car Open Road America 500</td>
                <td>Road America <br>Full Course</td>
                <td>Afternoon</td>
                <td>FP1: 23.05.2018 <br>FP2: 24.05.2018 <br>FP3: 25.05.2018 <br><strong>Main Event: 26.05.2018</strong></td>
              </tr>
            </tbody>
          </table>
        </li>
        <li>Start times for all sessions:
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Day &amp; Start Time</th>
                <th>Session Duration</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Wednesday at <strong>18:00 UTC</strong></td>
                <td>Start of Free Practice 1 <br><i>(360 minute duration)</i></td>
              </tr>
              <tr>
                <td>Thursday at <strong>18:00 UTC</strong></td>
                <td>Start of Free Practice 2 <br><i>(360 minute duration)</i></td>
              </tr>
              <tr>
                <td>Friday at <strong>18:00 UTC</strong></td>
                <td>Start of Free Practice 3 <br><i>(360 minute duration)</i></td>
              </tr>
              <tr>
                <td>Saturday at <strong>13:00 UTC</strong></td>
                <td>Start of Warm Up <br><i>(70 minute duration)</i></td>
              </tr>
              <tr>
                <td>Saturday at <strong>14:10 UTC</strong></td>
                <td>Start of Qualifying <br><i>(20 minute duration)</i></td>
              </tr>
              <tr>
                <td>Saturday at <strong>14:30 UTC</strong></td>
                <td>Start of the Race <br><i>(124 laps or 270 minute duration)</i></td>
              </tr>
            </tbody>
          </table>
        </li>
        <li>All sessions will be team sessions. Only registered teams and drivers are allowed to take part.</li>
      </ol>
      <h3>4. Entry Conditions and Requirements</h3>
      <ol class="rulebook-section">
        <li>To be able to enter, every team must have a team manager as well as a driver line-up consisting of at least 2 but no more than 6 drivers. Team managers as well as other non-driving team representatives don't have to fulfil any of the driver requirements.</li>
        <li>All driving team members, meaning everyone listed on a team's driver line-up, must meet the following minimum requirements at the point of sign-up:
          <ul class="list-group">
            <li class="list-group-item">Road Licence Class and Safety Rating: C2.00 or higher</li>
            <li class="list-group-item">Road iRating: 2000 or higher</li>
          </ul>
        </li>
      </ol>
      <h3>5. Entry Procedure</h3>
      <ol class="rulebook-section">
        <li>To enter the event, each team manager wishing to field one or multiple teams must register an account to be able to create these teams. For each team, all information must be filled in as required by the form on the website.</li>
        <li>Once a team has been created, the team’s status will automatically be set to 'Pending' until it’s been reviewed by the event administration. Once this has happened, the team’s status will be changed to 'Reviewed'.
          <ol><li>The team's status will only be set to 'Confirmed' once it has been reviewed by the event administration and has paid their entry fee of $5.00 in its entirety.</li></ol>
        </li>
        <li>Teams must pay their entry fees through PayPal no later than Monday, May 21st 2018 at 23:59 UTC to be allowed to race.
          <ol><li>The payment details will be sent to a team's manager once the team has been reviewed. Included in this e-mail will be a direct link to PayPal through which the entry fee can be paid.</li>
            <li>Should the link not work, please send the entry fee to info@sco.coresimracing.com and include a note that clearly indicates which entry or entries the transferred money is intended for. </li>
            <li>Please note that the teams must cover all transaction fees. Any amount of money that exceeds what teams must pay will be considered a donation. The same applies to any monetary sum that does not come with a payment note.</li></ol>
        </li>
        <li>A team's status determines what about a team can be edited. When set to 'Pending', everything about a team can be edited, including the name, car number, category and car, whereas all other statuses only allow for driver line-up changes.
          <ol><li>Should a team wish to change their name for example, the team manager must send a request to the event administration.</li>
          <li>Before the start of the event, team's will be allowed to change their cars until 24 hours before the start of the first free practice session.</li></ol>
        </li>
        <li>Every team’s driver line-up must be unique. No driver may be listed on more than a single car’s driver line-up. Should he wish to drive for another team, his previous team must remove him their line-up before he can be added to his new team’s line-up.
          <ol><li>The deadline for driver line-up changes ahead of each round will be 24 hours before the start of the first free practice session.</li>
          <li>Should a driver be added after the deadline and take part in the race, the team will have to serve a 30 second stop and hold penalty.</li></ol>
        </li>
        <li>No team will be allowed to field more than 2 entries in any class. The event administration reserves itself the right to waive this rule should the level of interest in a class be too low to fulfil the minimum car count.</li>
        <li>The total car count will be limited to 54 cars across all 3 categories. While there are no strict limits on how big each class can be, no class will be allowed to have fewer than 12 entrants with the maximum car count per class being capped at 24.
          <ol><li>The exact allocation of car slots will be determined by the number of teams signing up for each class, but it will always follow the minimum and maximum car counts as described above.</li>
          <li>Slots will be assigned on a 'first to come means first to be served' basis.</li>
          <li>Should fewer than 40 confirmed teams by Monday, May 21st 2018 at 23:59 UTC, the event will be cancelled with all entry fees being refunded.</li></ol>
        </li>
        <li>Should a confirmed team withdraw, resulting in a free spot within a class on on the grid in general, then the first on that classes' waiting list will be called up fill the spot.
          <ol><li>Substitute teams that replace previously confirmed teams will not have to pay the entry fee.</li>
          <li>Substitute teams will not be called up any later than 24 hours before the first free practice session, meaning that if a team withdraws after this point or during an ongoing event, that spot will be left vacant.</li></ol>
        </li>
        <li>Any team that withdraws or is withdrawn will not be refunded their entry fee.</li>
      </ol>
      <h3>6. Paint Schemes</h3>
      <ol class="rulebook-section">
        <li>All teams are free to submit custom paint schemes, should they want to use one.</li>
        <li>When submitting a paint scheme, every team has to make sure to include information like the team name, car number and car model. All paint scheme files should be named as shown below:
          <pre>car_team_XXXXX.tga	(XXXXX should be your team's ID)</pre>
        </li>
        <li>Should teams elect to use a paint scheme, they must send it to <a href="mailto:info@sco.coresimracing.com">info@sco.coresimracing.com</a> at least 24 hours before the start of first practice for it to be included in the latest version of the skin pack.
          <ol><li>Please make sure to include your team’s car number, team name and car class in the subject line of the e-mail when sending the paint file. You may also send multiple paint files in a single mail, but please make it clear which paint is for which car in the mail itself.</li></ol>
        </li>
        <li>Custom decal layers, including the event number boards as well as windscreen banners for all cars, will be used no matter whether a team sent in a paint file or not. These decal layers will also be included in the skin pack.</li>
        <li>Custom paint schemes for any single driver session, like both free practice sessions and any eventual test session do not have to be sent in and will not be accepted or included in any kind of skin pack.</li>
      </ol>
      <h3>8. Warm-up</h3>
      <ol class="rulebook-section">
        <li>Warm-up is the session in which all teams and drivers will be able to connect to the race server to prepare and drive practice laps ahead of qualifying and the race session itself.</li>
        <li>Teams will be required to register with the correct team and car, meaning that the team ID, team name, car number and car model have to match the information listed on the events' entry list.</li>
        <li>Should a team join with the incorrect team ID or car number, they will be allowed to participate in the remaining sessions, but will receive a drive-through penalty within the first 20 minutes of the race.
          <ol>li>No penalties will be given to teams who had their car number taken away by a team that registered before them.</li></ol>
        </li>
        <li>Any team that registers with the wrong car model or even registers with multiple teams will be disqualified from the event and refused entry to the qualifying and race sessions.</li>
      </ol>
      <h3>9. Qualifying</h3>
      <ol class="rulebook-section">
        <li>All qualifying sessions will be 20 minute long single car sessions with a maximum of 4 timed laps available to each car.</li>
        <li>As per iRacing lone qualifier rules, any member registered for the team will be allowed to qualify the car.</li>
        <li>The qualifying driver is not required to start the race, but they will be required to drive the car for at least 1 full lap (meaning it can’t be an out or in lap) during the race.</li>
        <li>Every car will be required to set a qualifying time. Teams who do not set a qualifying time or are slower than the fastest car of the class behind them will have to start from pit lane.</li>
        <li>The event administration may not allow a team to take the start, if they’re deemed to be a potential danger to other cars on-track during the race or if they haven’t set a fast enough lap time in qualifying (see Rule 9.d).</li>
      </ol>
      <h3>10. Race</h3>
      <ol class="rulebook-section">
        <li>All races will utilise the standard rolling start procedure the iRacing software provides with the following alterations:
          <ol><li>The class leaders of all supporting classes should keep a 10 second gap to the last car of the class ahead on the pace lap.</li>
          <li>All cars and classes, meaning DP, GT and CC must ignore the "green flag" as displayed by iRacing and must remain in their grid formation while also keeping to the pace car speed.</li>
          <li>Only the leader of each class will be allowed to initiate the start of their categories’ race by starting to accelerate away from the field in the “starting zone”. Once he has done so, all cars of that class will be free to race. All classes will be subject to this procedure.</li>
          <li>Images of the exact beginning and end points of this “starting zone” will be part of the drivers’ briefing, which will be published before the first free practice session.</li>
          <li>Teams that start from pit lane must line up at pit exit in a line. They will not be allowed to leave the lane until the race administration declares the pit exit open once the last CC car has passed the first turn. Leaving the pit lane early will result in a 30 second stop-hold penalty.</li></ol>
        </li>
        <li>During the race itself, the fair share driving rule will be enabled with a minimum of 2 drivers and a maximum of 6 drivers being able to drive the car.
          <ol><li>As per iRacing rules, a “fair share” is defined as a quarter of an equal share.<br>Example:
            <pre>2 drivers with a total of 124 laps driven<br>→ 124 laps / 2 drivers = 62 laps per driver on an equal share<br>→ 62 laps / 4 = 15.5 laps → 15 laps minimum per driver</pre>
          </li>
          <li>The minimum “fair share” lap count only applies to the number of drivers defined as the minimum required drivers, meaning only 3 drivers have to fulfil it in this event.</li></ol>
        </li>
        <li>Additionally, to make sure people don't take too many liberties with the track limits, especially at more modern circuits with multiple tarmac run-off zones, a formula will be used to calculate a team's maximum number of incident points.
          <ol><li>This formula will take both, the number of turns on the circuit as well as the number of laps driven by the team's car into account and looks as follows:
            <pre>Formula: (corners per lap * number of laps by car) / 25 = team's incident limit</pre>
          </li>
          <li>Using this formula, a team that's driven 124 laps on a circuit with 14 corners would be able to get up to 70 incident points before exceeding the limit. Fractional amounts will always be rounded up to the closest full number.</li>
          <li>Exceeding the incident limit will result in the car being disqualified from the race.</li></ol>
        </li>
      </ol>
      <h3>11. General Driving Conduct</h3>
      <ol class="rulebook-section">
        <li>All drivers must pass in a safe manner and respect their opponents. Both drivers must also take into account leaving room for lag. This applies to lapping manoeuvres just as much as to overtakes for race positions.</li>
        <li>Drivers will not be allowed to block and must choose their line ahead of a corner without moving under braking to cover off any attacks from their opponents (blocking meaning that you're reacting to line changes of the car behind to fend off any attempts of the car behind to get alongside).</li>
        <li>As this is an event with multiple car classes on-track at the same time, all of which have varying top speeds, braking performance and cornering capabilities, every driver is asked to take care of the previous two rules as well as always acting with common sense.
          <ol><li>Lapping cars must at all times be aware of the fact that they are the ones who have to make the passes since they're the faster cars. They can't expect to always have the racing line when doing so and will have to be just that little bit more cautious every now and then to make sure they they don't ruin another team's race along with their own.</li>
          <li>On the other side, all lapped drivers must make sure to always behave in a predictable manner. They should stick to the racing line where needed, but that doesn't at all mean that they can't cooperate should they find themselves in a situation where moving slightly off-line or braking slightly earlier will help a lapping car get by just that little bit sooner and faster, helping both cars in the process by losing less time on the race track.</li></ol>
        </li>
        <li>Should someone go off the track, they have to make sure that the track is clear before rejoining the racing surface. Dangerous track re-entries or even causing an incident while you try to rejoin will result in penalties when reported to the event administration.</li>
        <li>Under a waved yellow flag, please make sure to pay attention to the road ahead as well as any potentially stationary or slowly moving cars next to or on the race track itself.</li>
      </ol>
      <h3>12. Red Flags</h3>
      <ol class="rulebook-section">
        <li>If the iRacing service fails during a race resulting in drivers being unable to join or stay connected to the server or if the server becomes unstable enough to potentially cause problems for drivers, the event may be stopped or even postponed or cancelled. When this happens the event administration will announce the “red flag” status of the session both in-game (if the session is still accessible) and on the SCO Discord.</li>
        <li>The full red flag procedure can be found in Section 19 of this document.</li>
        <li>For races that have been red flagged, the race administration will decide on how races are scored on an individual basis.
          <ol><li>For example, if a race was interrupted at about the half-way mark of that race and a new session was required, the race administration may score both halves separately from each other, awarding half points for each.</li></ol>
        </li>
        <li>Should the iRacing service as a whole be affected by server issues, meaning that a new session or a restarted race would also run into trouble after a while, the event will be called off.</li>
        <li>It will be down the event administration to decide, whether the event will be rescheduled, replaced or cancelled.</li>
      </ol>
      <h3>13. Protests</h3>
      <ol class="rulebook-section">
        <li>Teams may protest any incidents they were involved in or affected by. The only way to do so is by filing a protest via the event protest form at any point after the start of the race to a maximum of 2 hours after the event ending.
          <ol><li>Incidents will be investigated at the earliest opportunity and will be judged by at least two different event administration members.</li>
          <li>The event administration will attempt to reach a verdict as quickly as possible, to ensure that as many of the protests as possible will result in the guilty parties being penalised during the race.</li>
          <li>Should the event administration not be able to reach a verdict during the race because there is too little time left in the race, the penalty (if applicable) will be converted to a post-race penalty.</li>
          <li>The verdicts of all post-race investigations will be published within 48 hours of the event’s conclusion.</li>
          <li>All protests and verdicts will be tracked in a spreadsheet and published once the results have been declared official.</li></ol>
        </li>
        <li>Frivolous protests will be ignored. Should a team be found to repeatedly file such protests, they may be warned or even penalised for their actions.</li>
        <li>The start of every race will automatically be reviewed by the race administration to check whether there were jump start or significant incidents.</li>
        <li>All protest verdicts are judgements of fact and cannot be appealed under any circumstances.</li>
      </ol>
      <h3>14. Penalties</h3>
      <ol class="rulebook-section">
        <li>There are several types of penalties that can be assigned following an investigation by the event administration. The list of possible penalties can be found below.
          <ul class="list-group">
            <li class="list-group-item">Warning</li>
            <li class="list-group-item">Drive-Through Penalty</li>
            <li class="list-group-item">Stop & Hold Penalty (severity is down the event administration)</li>
            <li class="list-group-item">Time Penalty (severity is down the event administration)</li>
            <li class="list-group-item">Points Deduction (severity is down to the event administration)</li>
            <li class="list-group-item">Disqualifications</li>
            <li class="list-group-item">Suspensions (meaning exclusions from multiple events)</li>
          </ul>
        </li>
        <li>Unlike stop-hold penalties, drive-through penalties cannot be combined with pit stops. Violations of this rule will in a further drive-through penalty.</li>
        <li>Once a team has received a driver-through penalty, they must not cross the timing line on the home straight more than 3 times before entering the pit lane to serve their penalty. Black flags (meaning stop-go or stop-hold penalties) should be served at the earliest opportunity that's available to the driver currently in the car.
          <ol>
            <li>Failure to serve a drive-through penalty within the prescribed amount of laps will result in the team receiving a 15 second stop-hold penalty.</li>
          </ol>
        </li>
        <li>Repeat offenders will receive harsher penalties, should they be penalised for the same type of misbehaviour multiple times.</li>
        <li>Penalties can affect teams as well as drivers individually, meaning a team can just as easily be excluded from competition as individual drivers, depending on the severity of the rule violations they committed.</li>
        <li>Should any warnings or penalties be assigned during or after the race, then they will always be announced on the Sports Car Open Discord before being applied in the game or the race results.  </li>
      </ol>
      <h3>15. Classification</h3>
      <ol class="rulebook-section">
        <li>All teams who start a race, fulfil the fair-share requirements and do not exceed their personal incident limit will be classified in their achieved overall race position in the official results.</li>
        <li>The 5 best classified teams of each category will receive an automatic invitation to the 2nd season of the Sports Car Open, provided all of following conditions are fulfilled:
          <ul class="list-group">
            <li class="list-group-item">The name of the entrant remains the same (e.g. CoRe SimRacing)</li>
      			<li class="list-group-item">The team manager is the same person as the team manager for this event</li>
      			<li class="list-group-item">At least one driver from this event's driver line-up carries over</li>
          </ul>
        </li>
      </ol>
      <h3>16. In-Game Session Settings</h3>
      <ol class="rulebook-section">
        <li>This section of the rulebook lists all in-game session settings that have not been brought up at an earlier point in this document.
          <ol><li>All sessions will be hosted on the NL-Amsterdam server farm.</li>
          <li>Dynamic weather will be used in all sessions. Exceptions include pre-qualifying (should it happen) or other types of test sessions that require fewer variables for more accurate data.</li>
          <li>The track state will be always be set to “automatically generated” at the beginning of a session and will carry over to the next sessions on race day. Marbles will be removed between sessions.</li>
          <li>Full course cautions as well as fast repairs will be disabled.</li>
          <li>All driving aids with the exceptions of clutch assists will be disallowed.</li></ol>
        </li>
      </ol>
      <h3>17. Contact Details and Communication</h3>
      <ol class="rulebook-section">
        <li>Should any questions arise, team managers, vice managers, drivers and other persons can contact the event administration using the e-mail address below. Responses to any questions about the regulations, team line-up changes or other inquiries will be sent within 24 hours of us receiving the original message.
          <pre>Contact E-Mail Address: <a href="mailto:info@sco.coresimracing.com">info@sco.coresimracing.com</a></pre>
        </li>
        <li>The event administration will also use a Discord server during events, but can also be contacted there at all other points. The permanent invite link to the Sports Car Open Discord can be found here: https://discord.gg/ShfkyTe
          <ol><li>The event administration advises all team managers of team mates that are in contact with drivers on-track to be online on the SCO Discord during races. In general, instructions will be given both in-game as well as on Discord, but there's always a chance that in the case of server issues, race control will be affected too, meaning they'll no longer be able to give instructions in-game and must resort to Discord only.</li></ol>
        </li>
        <li>Some members of the event administration can also be contacted via private messages on the iRacing forum. A list of these event administration members can be found below.
          <ul class="list-group">
            <li class="list-group-item">Dominik Engel</li>
    				<li class="list-group-item">Maik Paluch</li>
    				<li class="list-group-item">Ronald Großmann</li>
          </ul>
        </li>
        <li>The use of the text and voice chat during qualifying and race sessions is forbidden. While occasional and accidental violations will not have any negative consequences, repeated offences will lead to penalties, especially if the message is intended to call out or insult another participant or event administration member.</li>
      </ol>
      <h3>18. About This Document</h3>
      <ol class="rulebook-section">
        <li>The event regulations will apply to all test, practice, warm-up, qualifying and race sessions which are hosted by the event administration. By entering the event, all teams and drivers automatically agree to all rules and regulations in this document.</li>
        <li>This document may be edited to add, remove, modify or replace rules whenever the event administration deems it necessary. All changes made will be in effect immediately unless otherwise specified.</li>
        <li>Participants as well as event administration members and general attentive readers are encouraged to point out loopholes, spelling errors and general mistakes so that they can be closed and corrected respectively.</li>
      </ol>
      <h3>19. Red Flag Restart Procedure</h3>
      <ol class="rulebook-section">
        <li>Scenario 1: A mass disconnect occurs, but the session is stable enough to continue the race and the timing data is intact.
          <ol><li>All cars left out on-track must slowly return to the pit lane and park in their pit stalls. No overtaking is allowed to occur during this in-lap and teams will be allowed to work on their cars.</li>
          <li>After all teams have reconnected and completed their pit work, the restart procedure begins.</li>
          <li>Race control will instruct the overall leader to leave the pit lane, do a lap and stop just shy of the timing line to not start a new lap.</li>
          <li>One by one, all cars will be called out in order of their overall position. They must also go around the track and park up their car behind the car in front of them in the queue that's been started by the overall race leader.</li>
          <li>Drivers should not park their cars bumper to bumper when forming the queue. It's advised to leave a gap of two car lengths to the car ahead.</li>
          <li>Cars that have lost laps due to the mass disconnect will be instructed to do an extra lap before parking up at the end of the queue.</li>
          <li>The procedure described in19.a.4 to 19.a.6 will happen with all classes: First DP, then GT and then CC.</li>
          <li>Once all cars are back out on-track and formed up in the queue, all drivers must enable their pit speed limiters before slowly driving away from their parked positions. When driving away, they must remain in single file formation and in to one another.</li>
          <li>The leaders of the GT and CC classes respectively should leave a gap of about 5 seconds to the last car of the class ahead of them.</li>
          <li>Once all queued up cars are back rolling, the '10 seconds to green' warning will be given through the race control text chat.</li>
          <li>Once those 10 seconds have passed, the 'GREEN FLAG' message will appear in text chat, meaning that the race is back underway and that all cars are allowed to race each other again.</li></ol>
        </li>
        <li>Scenario 2: A new session is required because the current session is no longer accessible or the timing data is incomplete or missing.
          <ol><li>A new session will be put up with a short 15 minute practice, 5 minutes of qualifying and the race time that the race originally had, minus the time already passed, minus the time it took to set up the new session and minus another 30 minutes to account for the restart procedure.</li>
          <li>All teams will be instructed to join the new session once it's up. The session will attempt to replicate the weather settings of the previous session.</li>
          <li>Once the new session switches over to qualifying, nobody will be allowed to set a time.  When qualifying transitions into the race session, only the overall leader of the race will be allowed to grid their car.</li>
          <li>Once the race starts, race control will instruct the overall leader to do a lap and stop just shy of the timing line to not start a new lap.</li>
          <li>One by one, all cars will be called out in order of their overall position. They must also go around the track and park up their car behind the car in front of them in the queue that's been started by the overall race leader.</li>
          <li>Drivers should not park their cars bumper to bumper when forming the queue. It's advised to leave a gap of two car lengths to the car ahead.</li>
          <li>The procedure described in 19.b.5 and 19.b.6 will happen with all classes: First DP, then GT and then CC.</li>
          <li>Once all cars are back out on-track and formed up in the queue, all drivers must enable their pit speed limiters before slowly driving away from their parked positions. When driving away, they must remain in single file formation and in to one another.</li>
          <li>The leaders of the GT and CC classes respectively should leave a gap of about 5 seconds to the last car of the class ahead of them.</li>
          <li>Once all queued up cars are back rolling, the '10 seconds to green' warning will be given through the race control text chat.</li>
          <li>Once those 10 seconds have passed, the 'GREEN FLAG' message will appear in text chat, meaning that the race is back underway and that all cars are allowed to race each other again.</li></ol>
        </li>
      </ol>

    </div>
  </div>
</div>

@endsection
@section('additionalFooter')
<script type="text/javascript">
  $(function(){
    $('.rulebook-section').prev().append('<i class="fa fa-caret-square-o-down ml-3" aria-hidden="true"></i>').on('click', toggleRule);
    $('#openAllRules').on('click', openAllRules);
  });

  function toggleRule(){
    $(this).next().slideToggle();
    $(this).find('i').first().toggleClass('fa-caret-square-o-down').toggleClass('fa-caret-square-o-up');
  }
  function openAllRules(){
    if($(this).attr('data-status')=='closed'){
      $('.rulebook-section').slideDown().prev().find('i').removeClass('fa-caret-square-o-down').addClass('fa-caret-square-o-up');
      $(this).attr('data-status', 'open');
      $(this).find('span').first().html('Close all rules');
    }else{
      $('.rulebook-section').slideUp().prev().find('i').addClass('fa-caret-square-o-down').removeClass('fa-caret-square-o-up');
      $(this).attr('data-status', 'closed');
      $(this).find('span').first().html('Open all rules');
    }

  }
</script>
@endsection
