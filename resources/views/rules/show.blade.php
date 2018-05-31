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
        <li>All Sports Car Open events will feature three different classes of cars. Each car class will include the following car models:
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
                <td class="badge-P">P</td>
                <td>Audi R18<br>Porsche 919 Hybrid</td>
                <td>0 kg / 100%<br>0 kg / 100%</td>
              </tr>
              <tr>
                <td>Prototype Challenge</td>
                <td class="badge-PC">PC</td>
                <td>HPD ARX-01c</td>
                <td>0 kg / 66.7%</td>
              </tr>
              <tr>
                <td>Grand Touring</td>
                <td class="badge-GT">GT</td>
                <td>Ferrari 488 GTE<br>Ford GT GTE<br>Porsche 911 RSR</td>
                <td>0 kg / 100%<br>0 kg / 100%<br>0 kg / 100%</td>
              </tr>
            </tbody>
          </table>
          <ol>
            <li>Should iRacing release a new LMP2 or DPi specification car with similar performance characteristics to the current PC class car, then the series administration can replace the car with the new car if at least 66% of all teams in the class agree to the change.</li>
          </ol>
        </li>
        <li>The series administration reserves itself the right to add ballast or limit the fuel capacity of any car or car class to balance the cars within a class or to modify the balance between the car classes. Such car adjustments will never be made any later than 3 days before the start of warm-up. Generally, no adjustments will be made, unless the event administration feels that there are overly dominant car models within a class or too small or large performance gaps between car classes.</li>
        <li>Should an iRacing update affect the performance of one or multiple of the cars in the championship, the event administration can alter or reset any of the previously allocated weight handicaps or fuel capacity restrictions.</li>
      </ol>
      <h3>3. Timetable and Season Schedule</h3>
      <ol class="rulebook-section">
        <li>The series will visit a total of 6 different venues during the 2018-2019 season. The opening and final rounds of the season will be 8 hour races, all other races will be 4 hours long.
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Round</th>
                <th>Venue / Track Layout / Time of Day</th>
                <th>Session Dates</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Pre-Q.</td>
                <td>Autodromo Enzo e Dino Ferrari - Grand Prix - Afternoon</td>
                <td>26/08/2018 @ 16:00 UTC</td>
              </tr>
              <tr>
                <td>1</td>
                <td>8 hours of Spa-Francorchamps<br>Circuit de Spa-Francorchamps - GP Pits - Afternoon</td>
                <td>FP1: 27/09/2018<br>FP2: 28/09/2018<br>FP3: 29/09/2018<br>Main Event: 30/09/2018</td>
              </tr>
              <tr>
                <td>2</td>
                <td>4 hours of Monza<br>Autodromo Nazionale Monza - Grand Prix - Afternoon</td>
                <td>FP1: 01/11/2018<br>FP2: 02/11/2018<br>FP3: 03/11/2018<br>Main Event: 04/11/2018</td>
              </tr>
              <tr>
                <td>3</td>
                <td>4 hours of the Nürburgring<br>Nürburgring Grand-Prix-Strecke - Grand Prix - Afternoon</td>
                <td>FP1: 29/11/2018<br>FP2: 30/11/2018<br>FP3: 01/12/2018<br>Main Event: 02/12/2018</td>
              </tr>
              <tr>
                <td>4</td>
                <td>4 hours of the Americas<br>Circuit of the Americas - Grand Prix - Afternoon</td>
                <td>FP1: 03/01/2019<br>FP2: 04/01/2019<br>FP3: 05/01/2019<br>Main Event: 06/01/2019</td>
              </tr>
              <tr>
                <td>5</td>
                <td>4 hours of Interlagos<br>Autodromo Jose Carlos Pace – Grand Prix - Afternoon</td>
                <td>FP1: 31/01/2019<br>FP2: 01/02/2019<br>FP3: 02/02/2019<br>Main Event: 03/02/2019</td>
              </tr>
              <tr>
                <td>6</td>
                <td>8 hours of Silverstone<br>Silverstone Circuit - Grand Prix - Afternoon</td>
                <td>FP1: 21/02/2019<br>FP2: 22/02/2019<br>FP3: 23/02/2019<br>Main Event: 24/02/2019</td>
              </tr>
            </tbody>
          </table>
        </li>
        <li>Round 1 will use the following start times for all sessions:
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Day &amp; Start Time</th>
                <th>Session Duration</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Thursday at <strong>18:00 UTC</strong></td>
                <td>Start of Free Practice 1 <br><i>(360 minute duration)</i></td>
              </tr>
              <tr>
                <td>Friday at <strong>18:00 UTC</strong></td>
                <td>Start of Free Practice 2 <br><i>(360 minute duration)</i></td>
              </tr>
              <tr>
                <td>Saturday at <strong>18:00 UTC</strong></td>
                <td>Start of Free Practice 3 <br><i>(360 minute duration)</i></td>
              </tr>
              <tr>
                <td>Sunday at <strong>09:00 UTC</strong></td>
                <td>Start of Warm Up <br><i>(100 minute duration)</i></td>
              </tr>
              <tr>
                <td>Sunday at <strong>10:40 UTC</strong></td>
                <td>Start of Qualifying <br><i>(20 minute duration)</i></td>
              </tr>
              <tr>
                <td>Sunday at <strong>11:00 UTC</strong></td>
                <td>Start of the Race <br><i>(480 minute duration)</i></td>
              </tr>
            </tbody>
          </table>
        </li>
        <li>Rounds 2 to 5 will use the following start times for all sessions:
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Day &amp; Start Time</th>
                <th>Session Duration</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Thursday at <strong>19:00 UTC</strong></td>
                <td>Start of Free Practice 1 <br><i>(360 minute duration)</i></td>
              </tr>
              <tr>
                <td>Friday at <strong>19:00 UTC</strong></td>
                <td>Start of Free Practice 2 <br><i>(360 minute duration)</i></td>
              </tr>
              <tr>
                <td>Saturday at <strong>19:00 UTC</strong></td>
                <td>Start of Free Practice 3 <br><i>(360 minute duration)</i></td>
              </tr>
              <tr>
                <td>Sunday at <strong>14:00 UTC</strong></td>
                <td>Start of Warm Up <br><i>(100 minute duration)</i></td>
              </tr>
              <tr>
                <td>Sunday at <strong>15:40 UTC</strong></td>
                <td>Start of Qualifying <br><i>(20 minute duration)</i></td>
              </tr>
              <tr>
                <td>Sunday at <strong>16:00 UTC</strong></td>
                <td>Start of the Race <br><i>(240 minute duration)</i></td>
              </tr>
            </tbody>
          </table>
        </li>
        <li>Round 6 will use the following start times for all sessions:
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Day &amp; Start Time</th>
                <th>Session Duration</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Thursday at <strong>19:00 UTC</strong></td>
                <td>Start of Free Practice 1 <br><i>(360 minute duration)</i></td>
              </tr>
              <tr>
                <td>Friday at <strong>19:00 UTC</strong></td>
                <td>Start of Free Practice 2 <br><i>(360 minute duration)</i></td>
              </tr>
              <tr>
                <td>Saturday at <strong>19:00 UTC</strong></td>
                <td>Start of Free Practice 3 <br><i>(360 minute duration)</i></td>
              </tr>
              <tr>
                <td>Sunday at <strong>10:00 UTC</strong></td>
                <td>Start of Warm Up <br><i>(100 minute duration)</i></td>
              </tr>
              <tr>
                <td>Sunday at <strong>11:40 UTC</strong></td>
                <td>Start of Qualifying <br><i>(20 minute duration)</i></td>
              </tr>
              <tr>
                <td>Sunday at <strong>12:00 UTC</strong></td>
                <td>Start of the Race <br><i>(480 minute duration)</i></td>
              </tr>
            </tbody>
          </table>
        </li>
        <li>All sessions will be team sessions. Only registered teams and drivers are allowed to take part.</li>
      </ol>
      <h3>4. Entry Conditions and Requirements</h3>
      <ol class="rulebook-section">
        <li>To be able to enter, every team must have a team manager as well as a driver line-up consisting of at least 2 but no more than 6 drivers. Team managers as well as other non-driving team representatives don't have to fulfil any of the driver requirements.</li>
        <li>All driving team members, meaning everyone listed on a team's driver line-up, must meet the minimum requirements for their team's car class at the point of sign-up. The minimum requirements for each car class are listed below.
          <table class="table">
            <tr>
              <th>Car Clas</th>
              <th>Minimum Road SR</th>
              <th>Minimum Road iRating</th>
            </tr>
            <tr>
              <td>Prototype</td>
              <td>A 2.00 or higher</td>
              <td>2500 or higher</td>
            </tr>
            <tr>
              <td>Prototype Challenge</td>
              <td>B 2.00 or higher</td>
              <td>2250 or higher</td>
            </tr>
            <tr>
              <td>Grand Touring</td>
              <td>C 2.00 or higher</td>
              <td>2000 or higher</td>
            </tr>
          </table>
        </li>
      </ol>
      <h3>5. Entry Procedure</h3>
      <ol class="rulebook-section">
        <li>To enter the series, each team manager wishing to field one or multiple teams must register an account to be able to create these teams. For each team, all information must be filled in as required by the form on the website and the series regulations.</li>
        <li>Once a team has been created, the team’s status will automatically be set to 'Pending' until it’s been reviewed by the series administration. Once this has happened, the team’s status will be changed to 'Reviewed'.
          <ol><li>The team's status will only be set to 'Confirmed' once it has been reviewed by the series administration, made it through pre-qualifying and has paid their entry fee of $25.00 in its entirety.</li>
            <li>Teams with automatic invites do not have to advance through pre-qualifying to be have a guaranteed spot on the grid. Once an automatically invited team has had its status changed to 'Reviewed' they can ask to use their automatic invitation. They will then 			have their status changed to 'Pre-Qualified' and will have 72 hours to pay the entry fee in order to claim that spot without having to pre-qualify. A list of all automatically invited teams can be found below. Teams with '(x2)' have 2 invites, meaning they can field 2 cars without having to pre-qualify.<br><br>
            AVA Simsport; CoRe SimRacing (x2); Follow Me eSports; Glacier Racing; Hellenic Racing; Mivano Racing; MSP Phoenix Racing; Obsidian Racing; Positive SimRacing (x2); Pure Racing Team; Sekrit; SimatoK eSport; SimRC.de; Sorg eSports (x2); SRT eSport (x2); Team Buschfink Racing (x2); Team Chimera; Torque Freak Racing; 			TRITON Racing; Vendaval Simracing</li>
            <li>All other regular entrants, will be asked to not pay the entry fee until they're contacted about the matter following the publication of the official pre-qualifying results (check Section 7 for more information).</li>
          </ol>
        </li>
        <li>Teams, that have made it through pre-qualifying, must pay their entry fees through PayPalwithin 72 hours of having their team's status changed to 'Pre-Qualified'. This will happen assoon as the pre-qualifying results will be declared official.
          <ol><li>Should a category not have enough entrants to require a pre-qualifying session to takeplace 7 or fewer days from the pre-qualifying session's scheduled date, all teams in that category will have their status changed to 'Pre-Qualified'. The teams of said category will be given 7 days to cover their entry fee in this scenario.</li>
            <li>Once these teams have covered their entry fee, their status will be changed to 'Confirmed'.</li></ol>
        </li>
        <li>A team's status determines what about a team can be edited. When set to 'Pending', everything about a team can be edited, including the name, car number, category and car whereas all other statuses only allow for driver line-up changes.
          <ol><li>Should a team wish to change their name for example, the team manager must send a request to the event administration.</li>
          <li>Before the start of the season, team's will be allowed to change their cars until 24 hours before the start of pre-qualifying. Should no pre-qualifying session take place, then this deadline will be extended to 24 hours before the opening round's first free 			practice session.</li></ol>
        </li>
        <li>Every team’s driver line-up must be unique. No driver may be listed on more than a single car’s driver line-up. Should he wish to drive for another team, his previous team must remove him their line-up before he can be added to his new team’s line-up.
          <ol><li>The deadline for driver line-up changes ahead of each round will be 24 hours before the start of the first free practice session.</li>
          <li>Should a driver be added after the deadline and take part in the race, the team will be given a 30 seconds stop-hold penalty once he takes over the car.</li></ol>
        </li>
        <li>No team will be allowed to field more than 2 entries in any class. The series administration reserves itself the right to waive this rule for individual classes.</li>
        <li>The total car count across all 3 classes will be limited to 50. These 50 slots have been allocated to each class as follows:
          <ul class="list-group">
            <li class="list-group-item">Prototype: 16 slots</li>
            <li class="list-group-item">Prototype Challenge: 14 slots</li>
            <li class="list-group-item">Grand Touring: 20 slots</li>
          </ul>
          <ol><li>re-qualifying for a class will take place once there are more teams interested in entering than there are spots in a class. More information can be found in Section 7.</li></ol>
        </li>
        <li>Should fewer than 35 teams want to enter within 7 days of the opening round of the season, the championship will be cancelled with all entry fees being refunded.
        </li>
        <li>
          Should a confirmed team withdraw, resulting in a free spot within a certain class, the first team on that class' waiting list will be called up to fill the vacant spot for the rest of the season.
          <ol>
            <li>Substitute teams that replace previously confirmed teams will not have to pay the entry fee.</li>
            <li>Substitute teams will not be called up any later than 24 hours before a round's first free practice session, meaning that if a team withdraws after this point or during an ongoing event, that spot will be left vacant until the event's conclusion.</li>
          </ol>
        </li>
        <li>Any team that misses 2 rounds without notifying the series administration of their absence before the event, as well as any team that misses 3 rounds in a row, will be withdrawn from the series if their class' waiting list has any potential replacement teams on it. Any team that withdraws or is withdrawn for inactivity will not be refunded their entry fee.</li>
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
      <h3>7. Pre-Qualifying</h3>
      <ol class="rulebook-section">
        <li>Pre-Qualifying will take place if one or multiple categories require it due to the amount of teams interested in entering exceeding the amount of available slots in the class.</li>
        <li>The session will be a 3 hour long open qualifying session in which all teams will run together on-track at the same time. This 180 minute long session will be preceeded by a 45 minute long warm-up session, so all teams can join and get used to the track conditions.
          <ol>
            <li>Pre-qualifying will also be the only session of the season that will use default iRacing weather conditions. The time of day will be set to 'afternoon' as it will be for all other events during the season.</li>
          </ol>
        </li>
        <li>To pre-qualify, a team must field at least 2 of their drivers in the session. Both of them will be required to set at least one valid timed lap. The sum of both drivers' best laps will be a team's 		pre-qualifying lap time.</li>
        <li>The order in which teams will fill the available slots in each class based on their pre-qualifying time, from the fastest to the slowest team.
          <ol>
            <li>The waiting list will also be filled up based on the order of the teams in the pre-qualifying results: First all teams with valid times that failed to make the cut, then all teams with only one valid driver lap time, then all other teams based on their time of sign-up, with those having signed up longer ago being put above those who have signed up more recently.</li>
          </ol>
        </li>
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
          <li>All cars and classes, meaning P, PC and GT must ignore the "green flag" as displayed by iRacing and must remain in their grid formation while also keeping to the pace car speed.</li>
          <li>Only the leader of each class will be allowed to initiate the start of their categories’ race by starting to accelerate away from the field in the “starting zone”. Once he has done so, all cars of that class will be free to race. All classes will be subject to this procedure.</li>
          <li>Images of the exact beginning and end points of this “starting zone” will be part of the drivers’ briefing, which will be published before the first free practice session.</li>
          <li>Teams that start from pit lane must line up at pit exit in a line. They will not be allowed to leave the lane until the race administration declares the pit exit open once the last GT car has passed the first turn. Leaving the pit lane early will result in a 30 second stop-hold penalty.</li></ol>
        </li>
        <li>During the race itself, the fair share driving rule will be enabled with a minimum of 2 drivers and a maximum of 6 drivers being able to drive the car.
          <ol><li>As per iRacing rules, a “fair share” is defined as a quarter of an equal share.<br>Example:
            <pre>2 drivers with a total of 114 laps driven<br>→ 114 laps / 2 drivers = 57 laps per driver on an equal share<br>→ 57 laps / 4 = 14.25 laps → 15 laps minimum per driver</pre>
          </li>
          <li>The minimum “fair share” lap count only applies to the number of drivers defined as the minimum required drivers, meaning only 2 drivers have to fulfil it in this series.</li></ol>
        </li>
        <li>Additionally, to make sure people don't take too many liberties with the track limits, especially at more modern circuits with multiple tarmac run-off zones, a formula will be used to calculate a team's maximum number of incident points.
          <ol><li>This formula will take both, the number of turns on the circuit as well as the number of laps driven by the team's car into account and looks as follows:
            <pre>Formula: (corners per lap * number of laps by car) / 25 = team's incident limit</pre>
          </li>
          <li>Using this formula, a team that's driven 112 laps on a circuit with 18 corners would be able to get up to 81 incident points before exceeding the limit. Fractional amounts will always be rounded up to the closest full number.</li>
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
        <li>There are several types of penalties that can be assigned following an investigation by the series administration. The list of possible penalties can be found below.
          <ul class="list-group">
            <li class="list-group-item">Warning</li>
            <li class="list-group-item">Drive-Through Penalty</li>
            <li class="list-group-item">Stop & Hold Penalty of 30 seconds</li>
            <li class="list-group-item">Stop & Hold Penalty of 60 seconds</li>
            <li class="list-group-item">Stop & Hold Penalty of 120 seconds</li>
            <li class="list-group-item">Points Deduction (severity is down to the event administration)</li>
            <li class="list-group-item">Disqualifications</li>
            <li class="list-group-item">Exclusions from Multiple Events</li>
          </ul>
        </li>
        <li>Unlike stop-hold penalties, drive-through penalties cannot be combined with pit stops. Violations of this rule will in a further drive-through penalty.</li>
        <li>Once a team has received a drive-through penalty, they must not cross the timing line on the home straight more than 3 times before entering the pit lane to serve their penalty. Black flags (meaning stop-go or stop-hold penalties) should be served at the earliest opportunity that's available to the driver currently in the car.
          <ol>
            <li>Failure to serve a drive-through penalty within the prescribed amount of laps will result in the team receiving a 30 second stop-hold penalty.</li>
          </ol>
        </li>
        <li>Repeat offenders will receive harsher penalties, should they be penalised for the same type of misbehaviour multiple times.</li>
        <li>Penalties can affect teams as well as drivers individually, meaning a team can just as easily be excluded from competition as individual drivers, depending on the severity of the rule violations they committed.</li>
        <li>All warnings and penalties that are assigned during or after the race will be posted in the in-game chat, the list of submitted protests as well as the #race_control channel on the series Discord.</li>
      </ol>
      <h3>15. Championships</h3>
      <ol class="rulebook-section">
        <li>All teams who start a race, fulfil the fair-share requirements and do not exceed their personal incident limit will be classified in their achieved overall race position in the official results. Points will be given to the top 15 cars within each class.</li>
        <li>There will be three official championships in the series, one for each class.
          <ol>
            <li>The Sports Car Open Prototype title will be awarded to the P team which scores the most points throughout the whole season.</li>
            <li>The Sports Car Open Prototype Challenge title will be awarded to the PC team which scores the most points throughout the whole season.</li>
            <li>The Sports Car Open Grand Touring title will be awarded to the GT team which scores the most points throughout the whole season.</li>
          </ol>
        </li>
        <li>Championship points will be awarded to the top 15 classified cars within a category using the following scale:
          <table class="table">
            <tr>
              <th>Class Position</th>
              <th>Points scored</th>
            </tr>
            <tr>
              <td>1st</td>
              <td>25 points</td>
            </tr>
            <tr>
              <td>2nd</td>
              <td>20 points</td>
            </tr>
              <td>3rd</td>
              <td>16 points</td>
            </tr>
              <td>4th</td>
              <td>13 points</td>
            </tr>
              <td>5th</td>
              <td>11 points</td>
            </tr>
              <td>6th</td>
              <td>10 points</td>
            </tr>
              <td>7th</td>
              <td>9 points</td>
            </tr>
              <td>8th</td>
              <td>8 points</td>
            </tr>
              <td>9th</td>
              <td>7 points</td>
            </tr>
              <td>10th</td>
              <td>6 points</td>
            </tr>
              <td>11th</td>
              <td>5 points</td>
            </tr>
              <td>12th</td>
              <td>4 points</td>
            </tr>
              <td>13th</td>
              <td>3 points</td>
            </tr>
              <td>14th</td>
              <td>2 points</td>
            </tr>
              <td>15th</td>
              <td>1 points</td>
            </tr>
          </table>
        </li>
        <li>In the event of a tie in points standings, the position in question will go to the team with the most race victories. If neither team has a win or not more than the other, the position goes to the team with the most second place finishes. If the same applies there, the procedure is continued until the tie can be broken. Should this not be possible, both teams will be declared champions.</li>
        <li>Following the last round of the season, the top 8 teams in each category will receive automatic invites for the 2019-2020 Sports Car Open season.</li>
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
        <li>The series administration will also use a Discord server during events, but can also be contacted there at all other points. The permanent invite link to the Sports Car Open Discord can be found below: https://discord.gg/ShfkyTe
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
          <li>The procedure described in 19.a.4 to 19.a.6 will happen with all classes: First P, then PC and then GT.</li>
          <li>Once all cars are back out on-track and formed up in the queue, all drivers must enable their pit speed limiters before slowly driving away from their parked positions. When driving away, they must remain in single file formation and in to one another.</li>
          <li>The leaders of the PC and GT classes respectively should leave a gap of about 5 seconds to the last car of the class ahead of them.</li>
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
          <li>he procedure described in 19.b.5 and 19.b.6 will happen with all classes: First P, then PC and then GT.</li>
          <li>Once all cars are back out on-track and formed up in the queue, all drivers must enable their pit speed limiters before slowly driving away from their parked positions. When driving away, they must remain in single file formation and in to one another.</li>
          <li>The leaders of the PC and GT classes respectively should leave a gap of about 5 seconds to the last car of the class ahead of them.</li>
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
