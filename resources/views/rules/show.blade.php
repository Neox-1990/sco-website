@extends('master.master')

@section('main')

<div class="row">
  <div class="col-12">
    <div class="p-2" id="rulebook">
      <h1>Rulebook</h1>
      <a data-status="closed" class="btn btn-secondary m-1" id="openAllRules"><i class="fa fa-list-ol mr-2" aria-hidden="true"></i><span>Open all rules</span></a>
      <a class="btn btn-secondary m-1" href="{{asset('/assets/SCO2K17_RuleBook_Final_V5.pdf')}}" target="_blank"><i class="fa fa-file-pdf-o mr-2" aria-hidden="true"></i>Download as PDF</a>
      <hr>
      <h3>0. Introduction</h3>
      <ol class="rulebook-section">
        <li>The Sports Car Open is a racing league, which is organised and run by CoRe
SimRacing on the iRacing.com Motorsports Simulation service. The series will utilise
a selection of prototype and grand touring cars in a team-based, multiclass series
running at different types of circuits from all around the world.</li>
        <li>While racing is obviously about competition and trying to achieve the best possible
results, we would like to not lose the fun factor, since at the end of the day, it’s still
the top priority.</li>
        <li>We also expect all drivers and team representatives to treat each other as well as
members of the series administration with respect at all times.</li>
        <li>We are open to suggestions and constructive criticism as well as ideas and other
things that contribute to improving the series as a whole.</li>
      </ol>
      <h3>1. Cars and Class Structure</h3>
      <ol class="rulebook-section">
        <li>All Sports Car Open events will feature three different classes of cars. Each car
class will include the following car models:
          <table class="table table-bordered">
            <tr>
              <th>Class</th>
              <th>Abbreviation</th>
              <th>Car(s)</th>
              <th>Ballast / Fuel Cap.</th>
            </tr>
            <tr>
              <td>Prototype</td>
              <td class="badge-Prototype">P</td>
              <td>HPD ARX-01c</td>
              <td>0 kg / 100% (60kg)</td>
            </tr>
            <tr>
              <td>Grand Touring</td>
              <td class="badge-GT">GT</td>
              <td>Ferrari 488 GTE<br>Ford GT GTE</td>
              <td>0 kg / 100% (90l)<br>0 kg / 100% (98l)</td>
            </tr>
            <tr>
              <td>Grand Touring Challenge</td>
              <td class="badge-GTC">GTC</td>
              <td>Audi R8 LMS</td>
              <td>0 kg / 75% (90l)</td>
            </tr>
          </table>
          <ol>
            <li>Should iRacing release a new prototype car with similar performance
characteristics to the current P class car, then the series administration can
replace the old car with the new car if at least 66% of all teams in the class
agree to the change.</li>
            <li>Should iRacing release new GTE or GT3 specification cars, then they will
be added to the GT and GTC classes respectively, meaning that both classes
would have at least 2 cars to choose from.</li>
          </ol>
      </li>
      <li>The series administration reserves itself the right to add ballast or limit the fuel
capacity of any car or car class to balance the cars within a class or to modify the
balance between the car classes. Such car adjustments will never be made any later
than 3 days before the start of warm-up. Generally, no adjustments will be made,
unless the series administration feels that there are overly dominant car models
within a class or too small or large performance gaps between car classes.</li>
      <li>Should an iRacing update affect the performance of one or multiple of the cars in
the championship, the series administration can alter or reset any of the previously
allocated weight handicaps or fuel capacity restrictions.</li>
      </ol>
      <h3>2. Timetable and Season Schedule</h3>
      <ol class="rulebook-section">
        <li>The series will visit a total of 5 different venues during the 2017 season. All races
will be 4 hours long. The calendar looks as follows:
          <table class="table table-bordered">
            <tr>
              <th>R</th>
              <th>Venue / Track Layout</th>
              <th>Time of Day</th>
              <th>Session Dates</th>
            </tr>
            <tr>
              <td>1</td>
              <td>NÜRBURGRING <br>BES / WEC</td>
              <td>Morning</td>
              <td>FP1: 05.10.2017 <br>FP2: 06.10.2017 <br><strong>Race Day: 08.10.2017</strong></td>
            </tr>
              <td>2</td>
              <td>AUTODROMO NAZIONALE MONZA <br>Grand Prix</td>
              <td>Afternoon</td>
              <td>FP1: 02.11.2017 <br>FP2: 03.11.2017 <br><strong>Race Day: 05.11.2017</strong></td>
            </tr>
              <td>3</td>
              <td>CIRCUIT DE SPA-FRANCORCHAMPS <br>Grand Prix Pits</td>
              <td>Night</td>
              <td>FP1: 30.11.2017 <br>FP2: 01.12.2017 <br><strong>Race Day: 03.12.2017</strong></td>
            </tr>
              <td>4</td>
              <td>CIRCUIT OF THE AMERICAS <br>Grand Prix</td>
              <td>Late Afternoon</td>
              <td>FP1: 04.01.2018 <br>FP2: 05.01.2018 <br><strong>Race Day: 07.01.2018</strong></td>
            </tr>
              <td>5</td>
              <td>AUTODROMO JOSE CARLOS PACE <br>Grand Prix</td>
              <td>Morning</td>
              <td>FP1: 25.01.2018 <br>FP2: 26.01.2018 <br><strong>Race Day: 28.01.2018</strong></td>
            </tr>
          </table>
        </li>
        <li>Each round will use the following start times for all sessions:
          <table class="table table-bordered table-striped">
            <tr>
              <th>Day & Start Time</th>
              <th>Session Duration</th>
            </tr>
            <tr>
              <td>Thursday at <strong>17:00 UTC</strong></td>
              <td>Start of Free Practice 1 <br><i>(240 minute duration)</i></td>
            </tr>
            <tr>
              <td>Friday at <strong>17:00 UTC</strong></td>
              <td>Start of Free Practice 2 <br><i>(240 minute duration)</i></td>
            </tr>
            <tr>
              <td>Sunday at <strong>13:00 UTC</strong></td>
              <td>Start of Warm Up <br><i>(105 minute duration)</i></td>
            </tr>
            <tr>
              <td>Sunday at <strong>14:45 UTC</strong></td>
              <td>Start of Qualifying <br><i>(15 minute duration)</i></td>
            </tr>
            <tr>
              <td>Sunday at <strong>15:00 UTC</strong></td>
              <td>Start of the Race <br><i>(240 minute duration)</i></td>
            </tr>
          </table>
          <ol>
            <li>Team sessions will only be used for the main event itself. Sessions held
on days other than Sunday, like both free practice sessions, will always be
single driver sessions.</li>
          </ol>
        </li>
      </ol>
      <h3>3. Team and Driver Entry Requirements</h3>
      <ol class="rulebook-section">
        <li>To be able to enter, every team must have a team manager as well as a driver
line-up consisting of at least 2 but no more than 6 drivers. Team managers as well
as other non-driving team representatives don't have to fulfil any of the driver
requirements.</li>
        <li>All driving team members, meaning everyone listed on a team's driver line-up,
must meet the following minimum requirements at the point of sign-up:
          <table class="table table-bordered table-striped">
            <tr>
              <td>Road Licence Class & SR</td>
              <td>C 2.00 or higher <br> at the point of registration</td>
            </tr>
            <tr>
              <td>Road iRating</td>
              <td>2000 or higher <br>at the point of registration</td>
            </tr>
          </table>
        </li>
      </ol>
      <h3>4. Entry Procedure</h3>
      <ol class="rulebook-section">
        <li>To enter the series, each team manager wishing to field one or multiple teams
must register an account to be able to create these teams. For each team, all
information must be filled in as required by the form on the website.</li>
        <li>Once a team has been created, the team’s status will automatically be set to
“Pending” until it’s been reviewed by the series administration. Once this has
happened, the team’s status will either be changed to “On Waiting List” or
“Confirmed” depending on when in the season a team is created.
<ol>
  <li>A team’s status determines what about a team can be edited by the
team’s manager. The “Confirmed” status will only let you edit a team’s driver
line-up, whereas the “On Waiting List” and “Pending” statuses allow you to
edit everything on a team.</li>
  <li>A team that’s created before pre-qualifying has taken place will jump
straight to the “Confirmed” status as soon as the sign-up deadline (September
25th, 2017 at 17:00 UTC) has passed and will stay there if they pre-qualify for
one of the slots on the grid for the season (provided pre-qualifying takes
place).</li>
<li>Teams that do not make it through pre-qualifying will have their status
changed to “On Waiting List”. The same applies to teams that are created
after the original sign-up deadline (September 25th, 2017 at 17:00 UTC).</li>
</ol>
</li>
        <li>Each team’s driver line-up must be unique. No driver may be listed on more than
a single car’s driver line-up. Should he wish to drive for another team, his previous
team must remove him their line-up before he can be added to his new team’s lineup.</li>
        <li>No team will be allowed to have more than 2 entries in any class. The series
administration reserves itself the right to waive this rule should the level of interest
in a class be too low to fulfil the minimum car count.</li>
        <li>A team’s chosen car number, class and car model will be locked for the entire
season as soon as their team is given the “Confirmed” status. The only scenarios
under which a team would be allowed to change their car selection within a class
are described in rules 1.a.1 and 1.a.2 of this document.</li>
        <li>The total car count will be limited to 50 cars. While there are no strict limits on
how big each class can be, no class will be allowed to have fewer than 12 entrants
with the maximum car count per class being capped at 24.
<ol>
  <li>The exact allocation of car slots will be determined by the number of
teams signing up for each class, but it will always follow the minimum and
maximum car counts as described above.</li>
  <li>Should more than 65 teams want to enter in total, a pre-qualifying session
will be held for each category that requires it. The number of available slots
in each car class will be announced ahead of said pre-qualifying session.</li>
  <li>Should fewer than 65 teams wish to take part by the time the sign-up
deadline (September 25th, 2017 at 17:00 UTC) has passed, then all slots will
be allocated on a “first-come, first-served” basis.</li>
  <li>Exact details on how pre-qualifying is going to work (provided that it’s
needed) are described in Section 6 of this document.</li>
</ol>
</li>
        <li>Should a full season slot open up because of a team withdrawing or being
withdrawn from the season, then the first team on that class’ waiting list will be
promoted to the “Confirmed” status and will take up the vacant spot on the grid.
Should this happen during an ongoing event, then their slot will remain empty until
the following round.</li>
        <li>The application deadline for the opening round of the season will be on September
25th, 2017 at 17:00 UTC. Teams may still register after this point, but will only the have 
“On Waiting List” status and will join the end of the waiting list of the class they
entered, behind all teams that failed to make it through pre-qualifying (should it
have taken place).</li>
        <li>Teams that have the “Confirmed” status and are part of the grid will only be able
to edit their team’s driver line-up up until 24 hours before the start of a rounds’ first
free practice session (Wednesday at 17:00 UTC).</li>
        <li>Any team that misses 2 rounds without notifying the series administration of their
absence before the event will be withdrawn from the series.</li>
      </ol>
      <h3>5. Paint Schemes</h3>
      <ol class="rulebook-section">
        <li>All teams are free to submit custom paint schemes, should they want to use one.</li>
        <li>When submitting a paint scheme, every team has to make sure to include
information like the team name, car number and car model. All paint scheme files
should be named as shown below:
<pre><strong>car_team_XXXXX.tga</strong><br>(XXXXX should be your team's ID)</pre></li>
        <li>Should teams elect to use a paint scheme, they must send it to
<a href="mailto:info@sco.coresimracing.com">info@sco.coresimracing.com</a> at least 24 hours before the start of first practice for
it to be included in the lastest version of the skin pack.
<ol>
  <li>Please make sure to include your team’s car number, team name and
car class in the subject line of the e-mail when sending the paint file. You may
also send multiple paint files in a single mail, but please make it clear which
paint is for which car in the mail itself.</li>
</ol>
</li>
        <li>Custom decal layers, including the series number boards and class stickers for all
cars, will be used no matter whether a team sent in a paint file or not. These decal
layers will also be included in the skin pack.</li>
        <li>Custom paint schemes for any single driver session, like both free practice sessions
and any eventual test session do not have to be sent in and will not be accepted or
included in any kind of skin pack.</li>
      </ol>
      <h3>6. Pre-Qualifying</h3>
      <ol class="rulebook-section">
        <li>If required, pre-qualifying will take place on Wednesday, September 27th, 2017
at 17:00 UTC.</li>
        <li>Every category that requires a pre-qualifying to take place will have their own
separate session. The session will use the same circuit, track layout and time of day
as the opening round of the season. The track state will be set to “automatically
generated” and marbles will not be cleaned.</li>
        <li>The session will begin with a 45 minute long practice session in which ever team’s
pre-qualifying driver can join with the correct team, team name, car number and
car model.</li>
        <li>The 3 hour long open qualifying session at begin at roughly 17:45 UTC. Every team
will be allowed to turn as many laps as desired in order to get the fastest possible
lap time.</li>
        <li>Each team’s fastest qualifying time in that session will be their pre-qualifying
time. The driver who set the lap time will be locked into that team’s driver line-up
for the opening round of the season.</li>
      </ol>
      <h3>7. Warm-up</h3>
      <ol class="rulebook-section">
        <li>Warm-up is the session in which all teams and drivers will be able to connect to
the race server to prepare and drive practice laps ahead of qualifying and the race
session itself.</li>
        <li>Teams will be required to register with the correct team and car, meaning that
the team ID, team name, car number and car model have to match the information
listed on the series’ entry list.</li>
        <li>Should a team join with the incorrect team ID or car number, they will be allowed
to participate in the remaining sessions, but will receive a drive-through penalty
within the first 20 minutes of the race.
<ol>
  <li>No penalties will be given to teams who had their car number taken away
by a team that registered before them.</li>
</ol>
</li>
        <li>Any team that registers with the wrong car model or even registers with multiple
teams will be disqualified from the event and refused entry to the qualifying and
race sessions.</li>
      </ol>
      <h3>8. Qualifying</h3>
      <ol class="rulebook-section">
        <li>All qualifying sessions will be 15 minute long single car sessions with a maximum
of 3 timed laps available to each car.</li>
        <li>As per iRacing lone qualifier rules, any member registered for the team will be
allowed to qualify the car.</li>
        <li>The qualifying driver is not required to start the race, but they will be required to
drive the car for at least 1 full lap (meaning it can’t be an out or in lap) during the
race.</li>
        <li>Every car will be required to set a qualifying time to be allowed to take the start
of the race. For P and GT class cars, the time set must also be quicker than the
fastest time set by the GT and GTC pole sitters respectively.</li>
        <li>The series administration may not allow a team to take the start, if they’re
deemed to be a potential danger to other cars on-track during the race or if they
haven’t set a fast enough lap time in qualifying (see rule 8.d).</li>
      </ol>
      <h3>9. Race</h3>
      <ol class="rulebook-section">
        <li>All races will utilise the standard rolling start procedure the iRacing software
provides with the following alterations:
<ol>
  <li>The class leaders of all supporting classes should keep a 10 second gap to
the last car of the class ahead on the pace lap.</li>
  <li>Once iRacing waves the “green flag”, the P field’s race will be underway.
The GT and GTC class cars must ignore the green flag as displayed by iRacing
and must remain in their grid formation while also keeping to the pace car
speed.</li>
  <li>The leader of the GT class will be allowed to initiate the start of their
categories’ race by starting to accelerate away from the field once they’re in
the “starting zone”. Once he has done so, all cars in the class will be free to
race. The same procedure applies to the GTC class pole sitter and field.</li>
  <li>Images of the exact beginning and end points of this “starting zone” will
be part of the drivers’ briefing, which will be published before the first free
practice session.</li>
</ol>
</li>
        <li>During the race itself, the fair share driving rule will be enabled with a minimum
of 2 drivers and a maximum of 6 drivers being able to drive the car.
<ol>
  <li>As per iRacing rules, a “fair share” is defined as a quarter of an equal
share.<br>
<pre>Example: 2 drivers with a total of 110 laps driven
→ 110 laps / 2 drivers = 65 laps per driver on an equal share
→ → 65 laps / 4 = 16.25 laps as 16 laps minimum per driver</pre>
</li>
  <li>The minimum “fair share” lap count only applies to the number of drivers
defined as the minimum required drivers, meaning only 2 drivers have to fulfil
it in this series.</li>
</ol>
</li>
        <li>Additionally, to make sure people don't take too many liberties with the track
limits, especially at more modern circuits with multiple tarmac run-off zones, a
formula will be used to calculate a team's maximum number of incident points.
<ol>
  <li>This formula will take both, the number of turns on the circuit as well as
the number of laps driven by the team's car into account and looks as follows:<br><pre>Formula: (corners per lap * number of laps by car) * 0.03 = team's incident limit</pre></li>
  <li>Using this formula, a team that's driven 100 laps on a circuit with 21
corners would be able to get up to 63 incident points before exceeding the
limit. Fractional amounts will always be rounded up to the closest full number.</li>
  <li>Exceeding the incident limit will result in the car being disqualified from
the race.</li>
</ol>
</li>
      </ol>
      <h3>10. General Driving Conduct</h3>
      <ol class="rulebook-section">
        <li>All drivers must pass in a safe manner and respect their opponents. Both drivers
must also take into account leaving room for lag. This applies to lapping manoeuvres
just as much as to overtakes for race positions.</li>
        <li>Drivers will not be allowed to block and must choose their line ahead of a corner
without moving under braking to cover off any attacks from their opponents (blocking
meaning that you're reacting to line changes of the car behind to fend off any
attempts of the car behind to get alongside).</li>
        <li>As this is a series with multiple car classes on-track at the same time, all of which
have varying top speeds, braking performance and cornering capabilities, every
driver is asked to take care of the previous two rules as well as always acting with
common sense.
<ol>
  <li>Lapping cars must at all times be aware of the fact that they are the ones
who have to make the passes since they're the faster cars. They can't expect
to always have the racing line when doing so and will have to be just that little
bit more cautious every now and then to make sure they they don't ruin
another team's race along with their own.</li>
  <li>On the other side, all lapped drivers must make sure to always behave in
a predictable manner. They should stick to the racing line where needed, but
that doesn't at all mean that they can't cooperate should they find themselves
in a situation where moving slightly off-line or braking slightly earlier will help
a lapping car get by just that little bit sooner and faster, helping both cars in
the process by losing less time on the race track.</li>
</ol>
</li>
        <li>Should someone go off the track, they have to make sure that the track is clear
before rejoining the racing surface. Dangerous track re-entries or even causing an
incident while you try to rejoin will result in penalties when reported to the series
administration.</li>
        <li>Under a waved yellow flag, please make sure to pay attention to the road ahead
as well as any potentially stationary or slowly moving cars next to or on the race
track itself.</li>
      </ol>
      <h3>11. Server / Connection Issues and Race Stoppages</h3>
      <ol class="rulebook-section">
        <li>If the iRacing service fails during an event resulting in drivers being unable to join
or stay connected to the server or if the server becomes unstable enough to
potentially cause problems for drivers, the event may be stopped or even postponed
or cancelled. When this happens the series administration will announce the “red
flag” status of the session both in-game (if the session is still accessible) and on the
series Discord.
<ol>
  <li>Should the service experience issues during warm-up, a new session will
be created with the series administration attempting to keep to the everything
running on schedule.</li>
  <li>Should the service experience issues during qualifying, a new session will
be created to give everyone the chance to qualify for the race under fair
conditions. Again, the series administration will attempt to keep everything
running on schedule, but should the issues result in a longer delay, the series
administration does reserve itself the right to reduce the race length
accordingly by up to 1 hour.</li>
  <li>Should the service experience issues within the first hour of the race, a
new session will be created with a short warm-up, a new qualifying session a
3 hour long race. The less than 1 hour long part of the race will not count for
points, only the results of the new session can count for points.</li>
  <li>Should the service experience issues within the first 2 hours of the race,
a new session will be created with a short warm-up, a new qualifying session
and a 2 hour long race. If the race has run for at least 2 hours, then the series
administration can decide to declare the race and award half points based on
the positions from the last completed lap before the issues arose.</li>
  <li>Should the service experience issues after 3 the hour mark or later in the
race, then the series administration will declare the race and award full points
based on the position from the last completed lap before the issues arose.</li>
</ol>
</li>
        <li>Should the iRacing service as a whole be affected by server issues, meaning that
a new session or a restarted race would also run into trouble after a while, the event
will be called off.</li>
        <li>It will be down the series administration to decide, whether the event will be
rescheduled, replaced or cancelled.</li>
        <li>Regardless of what decision is made under whatever circumstances, they will
always be announced on the Sports Car Open Discord.</li>
      </ol>
      <h3>12. Protests</h3>
      <ol class="rulebook-section">
        <li>Teams may protest any incidents they were involved in or affected by. The only
way to do so is by filing a protest via the series protest form at any point after the
start of the race to a maximum of 2 hours after the event ending.
<ol>
  <li>Incidents will be investigated at the earliest opportunity and will be
judged by at least two different series administration members.</li>
  <li>The series administration will attempt to reach a verdict as quickly as
possible, to ensure that as many of the protests as possible will result in the
guilty parties being penalised during the race.</li>
  <li>Should the series administration not be able to reach a verdict during
the race because there is too little time left in the race, the penalty (if
applicable) will be converted to a post-race penalty.</li>
  <li>The verdicts of all post-race investigations will be published within 48
hours of the event’s conclusion.</li>
  <li>All protests and verdicts will be tracked in a spreadsheet and published
once the results have been declared official.</li>
</ol>
</li>
        <li>Frivolous protests will be ignored. Should a team be found to repeatedly file
such protests, they may be warned or even penalised for their actions.</li>
        <li>The start of every race will automatically be reviewed by the race
administration to check whether there were jump start or significant incidents.</li>
        <li>All protest verdicts are judgements of fact and cannot be appealed under any
circumstances.</li>
      </ol>
      <h3>13. Penalties</h3>
      <ol class="rulebook-section">
        <li>There are several types of penalties that can be assigned following an investigation
by the series administration. The list of possible penalties can be found below.
<ul>
  <li>Warning</li>
  <li>Drive-Through Penalty</li>
  <li>Stop & Hold Penalty (severity is down the series administration)</li>
  <li>Time Penalty (severity is down the series administration)</li>
  <li>Points Deduction (severity is down to the series administration)</li>
  <li>Disqualifications</li>
  <li>Suspensions (meaning exclusions from multiple events)</li>
</ul>
</li>
        <li>Unlike stop-hold penalties, drive-through penalties cannot be combined with pit
stops. Violations of this rule will in a further drive-through penalty.</li>
        <li>Repeat offenders will receive harsher penalties, should they be penalised for the
same type of misbehaviour multiple times.</li>
        <li>Penalties can affect teams as well as drivers individually, meaning a team can just
as easily be excluded from competition as individual drivers, depending on the
severity of the rule violations they committed.</li>
        <li>Should any warnings or penalties be assigned during or after the race, then they
will always be announced on the Sports Car Open Discord before being applied in the
game or the race results.</li>
      </ol>
      <h3>14. Championship</h3>
      <ol class="rulebook-section">
        <li>All teams who start a race, fulfil the fair-share requirements and do not exceed
their personal incident limit will be classified in their achieved overall race position
in the official results. Points will be given to the top 10 cars within each class.</li>
        <li>There will be three official championships in the series, one for each class.
<ol>
  <li>The Sports Car Open Prototype Championship will be awarded to the P
team which scores the most points throughout the whole season.</li>
  <li>The Sports Car Open Grand Touring Championship will be awarded to the
GT team which scores the most points throughout the whole season.</li>
  <li>The Sports Car Open Grand Touring Challenge will be awarded to the GTC
team which scores the most points throughout the whole season.</li>
</ol>
        </li>
        <li>Championship points will be awarded to the top 10 classified cars within a category
using the following scale:
<table class="table table-bordered table-striped">
  <tr>
    <th>Class Position</th>
    <th>Points Scored</th>
  </tr>
  <tr>
    <td>1st</td>
    <td>25 Points</td>
  </tr>
  <tr>
    <td>2nd</td>
    <td>18 Points</td>
  </tr>
  <tr>
    <td>3rd</td>
    <td>15 Points</td>
  </tr>
  <tr>
    <td>4th</td>
    <td>12 Points</td>
  </tr>
  <tr>
    <td>5th</td>
    <td>10 Points</td>
  </tr>
  <tr>
    <td>6th</td>
    <td>8 Points</td>
  </tr>
  <tr>
    <td>7th</td>
    <td>6 Points</td>
  </tr>
  <tr>
    <td>8th</td>
    <td>4 Points</td>
  </tr>
  <tr>
    <td>9th</td>
    <td>2 Points</td>
  </tr>
  <tr>
    <td>10th</td>
    <td>1 Point</td>
  </tr>
</table>
</li>
        <li>Teams that haven’t scored points will be ranked based on their best finish outside
the points. Should multiple teams have the same position as their best race result,
then the higher position will go to the team that achieved the result earlier in the
season.</li>
        <li>In the event of a tie in points standings, the position in question will go to the
team with the most race victories. If neither team has a win or not more than the
other, the position goes to the team with the most second place finishes. If the same
applies there, the procedure is continued until the tie can be broken. Should this not
be possible, both teams will be declared champions.</li>
      </ol>
      <h3>15. In-Game Session Settings</h3>
      <ol class="rulebook-section">
        <li>This section of the rulebook lists all in-game session settings that have not been
brought up at an earlier point in this document.
<ol>
  <li>All sessions will be hosted on the NL-Amsterdam server farm.</li>
  <li>Dynamic weather will be used in all sessions.</li>
  <li>The track state will be always be set to “automatically generated” at the
beginning of a session and will carry over to the next sessions on race day.
Marbles will not be removed from the circuit at any point.</li>
  <li>Full course cautions as well as fast repairs will be disabled.</li>
  <li>All driving aids with the exceptions of clutch assists will be disallowed.</li>
</ol>
</li>
      </ol>
      <h3>16. Contact Details and Communication</h3>
      <ol class="rulebook-section">
        <li>Should any questions arise, team managers, vice managers, drivers and other
persons can contact the series administration using the e-mail address below.
Responses to any questions about the regulations, team line-up changes or other
inquiries will be sent within 24 hours of us receiving the original message.
<br><pre>Series E-Mail Address:<br><a href="mailto:info@sco.coresimracing.com">info@sco.coresimracing.com</a></pre>
</li>
        <li>The series administration will also use a Discord server during events, but can also
be contacted there at all other points. The permanent invite link to the Sports Car
Open Discord can be found here:
<br><pre>Series Discord:<br><a href="https://discord.gg/ShfkyTe">https://discord.gg/ShfkyTe</a></pre>
</li>
        <li>Some members of the series administration can also be contacted via private
messages on the iRacing forum. A list of these series administration members can be
found below.
<ul>
  <li>Dominik Engel</li>
  <li>Ronald Großmann</li>
  <li>Maik Paluch</li>
</ul>
</li>
        <li>The use of the text and voice chat during qualifying and race sessions is forbidden.
While occasional and accidental violations will not have any negative consequences,
repeated offences will lead to penalties, especially if the message is intended to call
out or insult another participant or series administration member.</li>
      </ol>
      <h3>17. About This Document</h3>
      <ol class="rulebook-section">
        <li>The series regulations will apply to all test, practice, warm-up, qualifying and
race sessions which are hosted by the series administration. By entering the series,
all teams and drivers automatically agree to all rules and regulations in this
document.</li>
        <li>This document may be edited to add, remove, modify or replace rules whenever
the series administration deems it necessary. All changes made will be in effect
immediately unless otherwise specified.</li>
        <li>Participants as well as series administration members and general attentive
readers are encouraged to point out loopholes, spelling errors and general mistakes
so that they can be closed and corrected respectively.</li>
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
