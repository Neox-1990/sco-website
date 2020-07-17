@extends('master.master')

@section('main')

<div class="row mx-0">
  <div class="col-12">
    <div class="p-2" id="rulebook">
      <h1>Rulebook</h1>
      <p><em>Last update: 27th June 2020</em></p>
      <a data-status="closed" class="btn btn-outline-dark m-1" id="openAllRules"><i class="fas fa-list-ol mr-2" aria-hidden="true"></i><span>Open all rules</span></a>
      <hr>
      <h3>1. Introduction & Information</h3>
      <ol class="rulebook-section">
        <li>The Sports Car Open (or SCO) is a racing league, which is organised and run by CoRe SimRacing on the iRacing.com Motorsports Simulation service. The league utilises a selection of prototype and grand touring cars in a team-based, multi-class endurance racing series, with events being held at top level Grand Prix and sports car racing venues all around the world.</li>
        <li>These regulations will apply to all test, practice, warm-up, qualifying and race sessions that are hosted by the series administration. By entering the league, all teams and drivers automatically agree to all rules in this document.</li>
        <li>The document may be edited to add, remove, modify or replace rules whenever the series administration deems it to be necessary. All changes made will be in effect immediately unless otherwise specified.</li>
        <li>Participants as well as series administration members and general attentive readers are encouraged to point out loopholes, spelling errors and other mistakes so that they can be closed and corrected respectively. Feedback and improvement suggestions are also welcome.</li>
      </ol>
      <h3>2. Cars and Class Structure</h3>
      <ol class="rulebook-section">
        <li>All SCO events will feature three different classes of cars. A list of all classes and the eligible car models along with any assigned performance adjustments can be seen below.
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
                <td class="badge-P10">P</td>
                <td>HPD ARX-01c</td>
                <td>0 kg / 100% power / 100% fuel (= 80 l)</td>
              </tr>
              <tr>
                <td>Grand Touring</td>
                <td class="badge-GT10">GT</td>
                <td>BMW M8 GTE<br>Ferrari 488 GTE<br>Ford GT (2017)<br>Porsche 911 RSR</td>
                <td>0 kg / 100% power / 100% fuel (= 92 l)<br>0 kg / 100% power / 100% fuel (= 90 l)<br>0 kg / 100% power / 100% fuel (= 98 l)<br>0 kg / 100% power / 100% fuel (= 99 l)</td>
              </tr>
              <tr>
                <td>Grand Touring Challenge</td>
                <td class="badge-GT10">GTC</td>
                <td>Audi R8 LMS<br>Mercedes-AMG GT3</td>
                <td>0 kg / 95% power / 84% fuel (= 100 l)<br>0 kg / 95% power / 84% fuel (= 100 l)</td>
              </tr>
            </tbody>
          </table>
          <ol>
            <li>The series administration reserves itself the right to replace the car used in the Prototype class with a newer model, should iRacing release a new prototype car with similar performance characteristics to the current car. The decision regarding a replacement car will be made by the series administration based on the feedback of all teams competing in the Prototype class.</li>
          </ol>
        </li>
        <li>The series administration reserves itself the right to add ballast, change the power output or limit the fuel capacity of any car or car class to balance the cars within a class or to modify the balance between the car classes. Such car adjustments will never be made any later than 3 days before the start of warm-up. Generally, no adjustments will be made, unless the series administration feels that there are overly dominant car models within a class or too small or large performance gaps between car classes. </li>
        <li>Should an iRacing update affect the performance of one or multiple of the cars in the championship, the series administration can alter or reset any of the previously allocated weight handicaps or fuel capacity restrictions.</li>
      </ol>
      <h3>3. Timetable and Season Schedule</h3>
      <ol class="rulebook-section">
        <li>The series will visit a total of 7 different circuits during the 2020-2021 season. The session dates and start times as well as the sim date and time of day are listed below.
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td colspan="3" class="pt-5">PQ<b class="mx-5">Pre-Qualifying at Okayama</b>(Okayama International Circuit - Full Course)</td>
              </tr>
              <tr>
                <th>Session</th>
                <th>SimTime</th>
                <th>Session Start</th>
              </tr>
              <tr>
                <td>Warm-Up (50 min)	</td>
                <td>2020-05-15 at 02:06 pm local</td>
                <td>Sun, 30/08/2020 at 13:10 UTC</td>
              </tr>
              <tr>
                <td>Qualifying (240 min)</td>
                <td>2020-05-15 at 02:06 pm local</td>
                <td>Sun, 30/08/2020 at 14:00 UTC</td>
              </tr>
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
                  <td>{{(Carbon\Carbon::createFromTimeString($round['fp1_start']))->format('D, d/m/y')}} at {{(Carbon\Carbon::createFromTimeString($round['fp1_start']))->format('H:i')}} UTC</td>
                </tr>
                <tr>
                  <td>Free Practice 2 ({{$round['fp2_minutes']}} min)</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['fp2_insimdate']))->format('Y-m-d')}} at {{(Carbon\Carbon::createFromTimeString($round['fp2_insimdate']))->format('H:i a')}} local</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['fp2_start']))->format('D, d/m/y')}} at {{(Carbon\Carbon::createFromTimeString($round['fp2_start']))->format('H:i')}} UTC</td>
                </tr>
                <tr>
                  <td>Free Practice 3 ({{$round['fp3_minutes']}} min)</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['fp3_insimdate']))->format('Y-m-d')}} at {{(Carbon\Carbon::createFromTimeString($round['fp3_insimdate']))->format('H:i a')}} local</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['fp3_start']))->format('D, d/m/y')}} at {{(Carbon\Carbon::createFromTimeString($round['fp3_start']))->format('H:i')}} UTC</td>
                </tr>
                <tr>
                  <td>Warm-Up ({{$round['warmup_minutes']}} min)</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['warmup_insimdate']))->format('Y-m-d')}} at {{(Carbon\Carbon::createFromTimeString($round['warmup_insimdate']))->format('H:i a')}} local</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['warmup_start']))->format('D, d/m/y')}} at {{(Carbon\Carbon::createFromTimeString($round['warmup_start']))->format('H:i')}} UTC</td>
                </tr>
                <tr>
                  <td>Qualifying ({{$round['qual_minutes']}} min)</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['qual_insimdate']))->format('Y-m-d')}} at {{(Carbon\Carbon::createFromTimeString($round['qual_insimdate']))->format('H:i a')}} local</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['qual_start']))->format('D, d/m/y')}} at {{(Carbon\Carbon::createFromTimeString($round['qual_start']))->format('H:i')}} UTC</td>
                </tr>
                <tr>
                  <td>Race ({{$round['race_minutes']}} min)</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['race_insimdate']))->format('Y-m-d')}} at {{(Carbon\Carbon::createFromTimeString($round['race_insimdate']))->format('H:i a')}} local</td>
                  <td>{{(Carbon\Carbon::createFromTimeString($round['race_start']))->format('D, d/m/y')}} at {{(Carbon\Carbon::createFromTimeString($round['race_start']))->format('H:i')}} UTC</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </li>
        <li>All sessions will be team sessions. Only registered teams and drivers are allowed to take part.</li>
      </ol>
      <h3>4. Entry Conditions and Requirements</h3>
      <ol class="rulebook-section">
        <li>To be able to enter, every team must have a team manager as well as a driver line-up consisting of at least 2 but no more than 6 drivers. Team managers as well as other non-driving team representatives don't have to fulfil any of the driver requirements.</li>
        <li>All driving team members, meaning everyone listed on a team's driver line-up, must meet the minimum requirements for their team's car class at the point of sign-up. The Road Safety Rating and Road iRating requirements for each car class are listed below.
          <table class="table table-bordered">
            <tr>
              <th>Car Class</th>
              <th>Minimum Road SR</th>
              <th>Minimum Road iRating</th>
            </tr>
            <tr>
              <td>Prototype (P)</td>
              <td>C 4.00 or higher</td>
              <td>2500 or higher</td>
            </tr>
            <tr>
              <td>Grand Touring (GT)</td>
              <td>D 4.00 or higher</td>
              <td>2500 or higher</td>
            </tr>
            <tr>
              <td>Grand Touring Challenge (GTC)</td>
              <td>D 4.00 or higher</td>
              <td>2500 or higher</td>
            </tr>
          </table>
        </li>
        <li>The series administration reserves itself the right to prevent teams, team managers and drivers from entering the series if it's deemed to be necessary from their point of view.
          <ol>
            <li>Decisions like these will typically be made based on a team's, team manager's or driver's conduct in other leagues as well as official iRacing series in the weeks and months leading up to the entry request, though other reasons may also factor into the decision.</li>
            <li>The decision to reject the entry of a team, team manager or driver will be made on a case-by-case basis for each season, meaning that teams, team managers and drivers who are prevented from entering may attempt to enter the series again in future. </li>
            <li>The series administration's decision to reject the entry of any team, team manager or driver into the current season is final and cannot be appealed.</li>
          </ol>
        </li>
      </ol>
      <h3>5. Entry Procedure</h3>
      <ol class="rulebook-section">
        <li>The sign-ups for all teams will open on Monday, July 20th, 2020 at 16:00 UTC. From this point onwards, all teams, those with automatic invites and those without, will be able to create teams on the series website.
          <ol>
            <li>Please note that no team will be allowed to enter more than 2 cars into any of the classes. The maximum number of available spaces per car class can be seen below:
              <ul>
                <li>Prototype (P): 15 cars</li>
                <li>Grand Touring (GT): 18 cars</li>
                <li>Grand Touring Challenge (GTC): 15 cars</li>
                <li>Total: 48 cars</li>
              </ul>
            </li>
            <li>The series administration can grant exceptions to the 2 car limit per class per team upon receiving a request from the team manager(s) of the affected entries. These requests will be assessed on a case-by-case basis.</li>
            </ol>
        </li>
        <li> Teams with automatic invites must enter no later than Sunday, August 16th, 2020 at 23:59 UTC and must pay the full entry fee of $55 in order to claim their automatic invites. A list of all automatically invited teams can be found <a class="btn btn-primary p-1" href="https://docs.google.com/spreadsheets/d/1WJrSIQEaAkLEz_soTvx6GwdxMsftW48Z7CJR_TyW3YI/">here <i class="fas fa-external-link-alt"></i></a>.
          <ol>
            <li>Automatic invites earned through competing in the P1 (Prototype 1) or P2 (Prototype 2) class during the 2019-2020 SCO season (SCO3) may only be used to enter the P (Prototype) class for the 2020-2021 SCO season (SCO4).</li>
            <li>Automatic invites earned through competing in the GT (Grand Touring) class during the 2019-2020 SCO season (SCO3) or through a top 3 class finish in the 2020 SCO 1000 Miles of Interlagos may be used to enter the GT (Grand Touring) or GTC (Grand Touring Challenge) classes for the 2020-2021 SCO season (SCO4).</li>
            <li>The only way to change which class or classes a team's invite is valid for is to swap the invite with another invited team. To do so, both teams with an invite may approach the series administration together to request to switch their invites. This is only possible if the series administration agrees and if neither team in this scenario has entered a car using their invite yet.</li>
            <li>Managers, who have used their invite when creating a team, but did not pay the entry fee of $55 for that team by the date listed in 5.b, will lose their invited status and will be treated like every other regular entrant from this point onwards.</li>
            <li>If a team has changed names or changed managers since earning the invite, the team, or the new team management respectively, can contact the series administration to request a transfer of the invite. These requests will be assessed on a case-by-case basis.</li>
            <li>All other unused automatic invites will also expire on the date listed in 5.b.</li>
          </ol>
        </li>
        <li>The entry deadline for all regular entrants will be on Sunday, August 23rd, 2020 at 23:59 UTC.
          <ol>
            <li>Should the number of teams entering a class not exceed the number of available slots for that class (see 5.a.1) by the date mentioned in 5.c, then the teams of said class must pay their entry fee of $55 by Saturday, August 29th, 2020 at 23:59 UTC.</li>
            <li>Should a class have fewer entries than the categories' maximum car count allows for (see 5.a.1), then the remaining open slots will instead be re-allocated to the class with the highest number of cars on the waiting list (e.g.: Only 13 P cars enter, meaning 2 slots remain open and GT has the most reserves => GT will receive the additional 2 slots to make it a 20 car class).</li>
            <li>Should the need for a pre-qualifying session disappear through the slot re-allocation described in 5.c.2, then the teams of this class will also have to pay the entry fee of $55 by the deadline described in 5.c.1.</li>
            <li>In any case, a team that doesn't have to pre-qualify themselves onto the grid but still fails to pay the entry fee of $55 by the deadline mentioned in 5.c.1 will lose that spot and will be demoted to the waiting list for their class instead. That new open slot would be re-assigned to the car category with the most entries as described in 5.c.2.</li>
            <li>Teams, in categories with enough entries to require a pre-qualifying session to take place, will be required to pre-qualify themselves into the field, unless their team entered the series using an automatic invite. More information about pre-qualifying can be found in Section 7 of this document.</li>
          </ol>
        </li>
        <li>Should a pre-qualifying session have taken place on Sunday, August 30th, 2020 at 13:10 UTC, the results will be published no later than Tuesday, September 1st, 2020 at 13:10 UTC.
          <ol>
            <li>All teams that made it through pre-qualifying will have until Sunday, September 6th, 2020 at 23:59 UTC to pay their entry fee of $55.</li>
            <li>Teams that fail to pay the entry fee of $55 in time will lose their spot to the next team that failed to make the cut in their category. This new team will then have a maximum of 48 hours to pay the entry fee of $55 and claim the slot before this procedure is repeated and the next reserve team team will be given the same time period to pay and claim the slot.</li>
            <li>Once a team has claimed a slot by paying the entry fee within 48 hours once they've been given the chance to do so (see 5.d.2), the team that initially qualified for the spot on the grid will become the new first reserve team in their class. All other reserve teams will remain on the waiting list in the same order they were in before the procedure described in 5.d.2 began.</li>
            <li>Should a class run out of teams through the procedure described in 5.d.2, then the first team of the next-biggest class that had teams attempting to pre-qualify themselves into the field will go through the same procedure as mentioned above.</li>
          </ol>
        </li>
        <li>Every team that's created during a season will have a team status assigned to it. There are a total of 5 different statuses: 'Pending', 'Reviewed', 'Waiting List', 'Qualified' and 'Confirmed'.
          <ol>
            <li>Newly created teams will have their status set to 'Pending' automatically. Once the series administration has checked everything about said newly created team, the team's status will either be changed to 'Reviewed' (for regular entrants) or 'Qualified' if a team enters using an automatic invite.</li>
            <li>When a team’s status is set to ‘Qualified’, they’ll be sent the payment details for the season entry fee via a team status update email.</li>
            <li>Once a team with the 'Qualified' status has paid the entry fee of $55 in its entirety, their team's status will be changed to 'Confirmed'.</li>
            <li>The 'Waiting List' status will be reserved for teams on the waiting list for their respective class.</li>
          </ol>
        </li>
        <li>After a team has been created, a team manager will only be allowed to edit the driver line-up of his teams. Should he wish to edit further details, he must contact the series administration.
          <ol>
            <li>Driver line-ups may not be edited any later than 24 hours before the start of pre-qualifying and no later than 24 hours before the start of FP1 ahead of each round. All edits made beyond these points will only be valid for future events.</li>
            <li>Should a driver, who was added to a team's lineup after the deadline actually compete in the race, the team in question will receive a 30 second stop & hold penalty once said driver has taken over the car.</li>
            <li>There is only a single scenario under which drivers cannot be moved freely from one team's roster to another: The drivers, who prequalified a team's car into the field, must remain part of that car's driver line-up until after the 2nd event of the season has been completed. For transparency reasons, this limitation is also referenced in rule 7.f.</li>
          </ol>
        </li>
        <li>Ahead of the first round of the season, all teams, that have entered a car class with multiple car models, must declare their final car selection for the season no later than Sunday, September 20th, 2020 at 23:59 UTC.
          <ol>
            <li> Rule 5.g does not apply to waiting list teams, who may change their car model up to the point of being asked to fill an open spot in their class.</li>
          </ol>
        </li>
        <li>Should a 'Confirmed' team withdraw, resulting in a free spot within a certain class, the first team on that class' waiting list will be called up to fill the vacant spot for the rest of the season.
          <ol>
            <li>In the case of there being no waiting list teams for said car class, the first waiting list team of the next-biggest car class will fill the spot instead.</li>
            <li>Substitute teams that replace previously confirmed teams will not have to pay the entry fee, unless they’re called up from the waiting list before the first event of the season. Teams called up prior to the season opener must pay the entry fee within 48 hours of being contacted about their new status.</li>
            <li>Called-up teams that race in a class with multiple car models are allowed to change their car until the Sunday before the upcoming rounds' first free practice session at 23:59 UTC.</li>
            <li>Substitute teams will not be called up any later than the deadline mentioned in 5.h.3, meaning that if a team withdraws after that deadline or during an ongoing event, that spot will be left vacant until the event's conclusion.</li>
            <li>The series administration reserves itself the right to not call up substitute teams if there’s only one more round to go before the end of the season.</li>
          </ol>
        </li>
        <li>Any team that misses 2 rounds without notifying the series administration of their absence before that event's race start, as well as any team that misses 3 rounds in a row, will be removed from the series.</li>
        <li>Teams, who withdraw from the series or are removed from the series due to missing too many events, will not have their entry fee of $55 refunded to them.
          <ol>
            <li>The only exception to the scenario in 5.j is if a team withdraws before the first event of the season and in-time to let a replacement team fill the slot left vacant by them. Should this happen, the entry fee of $55 will be refunded to that team.</li>
          </ol>
        </li>
      </ol>
      <h3>6. Paint Schemes</h3>
      <ol class="rulebook-section">
        <li>All participating teams are required to submit custom paint schemes.</li>
        <li> When submitting a paint scheme, every team has to make sure to include information like the team name, car number and car model. All paint scheme files should be named as shown below:
          <pre>car_team_XXXXXX.tga	(XXXXXX should be your team's ID)</pre>
        </li>
        <li>All custom paint schemes that are received by the series administration will be reviewed and must be in compliance with the 5 rules listed below.
          <ol>
            <li>Teams must provide written permission from the companies involved, to be allowed to run sponsors' logos on their car.</li>
            <li>Logos of products that compete with iRacing (such as the Gran Turismo and Forza franchises for example) will not be permitted. The same is the case for logos of automotive brands that compete with the brand of car that they're displayed on.</li>
            <li>It will be strictly forbidden for paint schemes to directly or indirectly promote tobacco or any products that are restricted to minors by law (e.g.: alcohol, knives, etc.). They must not include any kind of political message.</li>
            <li>No team liveries will be allowed to run 'parodies' of logos or other intellectual property.</li>
            <li>Any logo already available in the iRacing Paint Shop may be used.</li>
          </ol>
        </li>
        <li>To submit a custom paint file, it must be sent to <a class="btn btn-primary p-1" href="mailto:info@sportscaropen.eu"><i class="far fa-envelope"></i> info@sportscaropen.eu</a> at least 24 hours before the start of first practice for it to be included in the paints pack for the event.
          <ol>
            <li>Please make sure to include your team’s car number, team name and car class in the subject line of the email when sending the paint file. You may also send multiple paint files in a single mail, but please make it clear which paint is for which car in the mail itself.</li>
          </ol>
        </li>
        <li>Custom number panels and class identification stickers will be used and must be included on the paint file that is sent to the series administration.
          <ol>
            <li>All of these paints should be saved as TARGA (.tga) files with a 24 bits/pixel resolution and RLE compression enabled.</li>
            <li> Teams, who also wish to make use of custom spec maps, must ensure that none of the custom number panels, class identification stickers or other mandatory paint elements are made overly reflective or have their appearance changed in other ways that makes them harder to read. </li>
          </ol>
        </li>
        <li>The series administration will check whether every team's paint is in compliance with rules 6.c.1 to 6.c.5 and will also check for the car and class appropriate number panels and class identification stickers. If there are issues with any submitted paint, the series administration will respond via email.</li>
        <li>Driver suits and helmet paints may also be submitted.</li>
      </ol>
      <h3>7. Pre-Qualifying Procedure</h3>
      <ol class="rulebook-section">
        <li>Pre-Qualifying will take place if one or multiple categories require it due to the amount of teams interested in entering exceeding the amount of available slots in the class. The scheduled date for this pre-qualifying session will be Sunday, August 30th, 2020 at 13:10 UTC.</li>
        <li>Every car class that requires a pre-qualifying session to take place will have its own session. All sessions will be 240 minutes long and will be preceded by a 50 minute long warm-up session, so all teams can join and familiarise themselves with the track conditions.
          <ol>
            <li>All pre-qualifying sessions will be set up using the following settings:
              <table class="table table-sm">
                <tr>
                  <td>Venue:</td>
                  <td>Okayama International Circuit (Full Course)</td>
                </tr>
                <tr>
                  <td>SimTime:</td>
                  <td>2020-05-15 @ 02:06 pm local (afternoon; dynamic sky will be disabled)</td>
                </tr>
                <tr>
                  <td>Track State:</td>
                  <td>Starting at 100% and will be carried over; marbles will be cleaned</td>
                </tr>
                <tr>
                  <td>Weather:</td>
                  <td>65°F ambient; 55% RH; N winds at 2 mph; clear skies</td>
                </tr>
              </table>
            </li>
            <li>Should the number of teams taking part in a single car class' pre-qualifying exceed 25, then they will be evenly split across multiple sessions to ensure no single session has more than 25 teams within it. All sessions will use the same settings as described in 7.b and 7.b.1.</li>
            <li>Which teams would be assigned to which session in the scenario described in 7.b.2, will be decided by the series administration. A list of which teams are meant to be in which session would be published no later than 48 hours before the scheduled start of pre-qualifying.</li>
          </ol>
        </li>
        <li>To pre-qualify, a team must field at least 2 of their drivers in the session. Both of them will be required to drive at least 10 consecutive timed laps without an incident. The sum of the 2 fastest drivers' fastest run of 10 consecutive timed and incident-free laps will be a team's pre-qualifying time.
          <ol>
            <li>Only drivers that were on a team's driver line-up before the team editing deadline ahead of pre-qualifying will be allowed to compete. Any lap times set by drivers that were either added too late or drivers that aren't part of a team's lineup will be disregarded in the pre-qualifying results.</li>
          </ol>
        </li>
        <li>The order in which teams will fill the available slots in each class based on their pre-qualifying time, from the fastest to the slowest team.
          <ol>
            <li>Teams that did not make it into the field will be placed on the waiting list. Teams that competed in pre-qualifying and have a valid PQ time will be placed on the waiting list in the order of their PQ times, from fastest to slowest. All other teams will be placed on the waiting list based on their team's sign-up date, with older teams being placed ahead of those that signed up more recently.</li>
          </ol>
        </li>
        <li>During pre-qualifying, all drivers on-track must be aware of their surroundings at all times. Any team found to be interfering with another team's pre-qualifying laps in any way, may be penalised if the incident is reported to the series administration.</li>
        <li>The 2 drivers, who prequalified a team's car into the field, will be locked into that car's driver line-up for the first 2 events of the season. This limitation does not apply, if an entry not make it through pre-qualifying and ends up on the waiting list. For transparency reasons, this limitation is also mentioned in rule 5.f.3.</li>
      </ol>
      <h3>Warm-Up Sessions</h3>
      <ol class="rulebook-section">
        <li>Warm-up is the session in which all teams and drivers will be able to connect to the race server to prepare and drive practice laps ahead of qualifying and the race session itself.</li>
        <li>Teams will be required to register with the correct team and car, meaning that the team ID, team name, car number and car model have to match the information listed on the series’ entry list.</li>
        <li>Should a team join with the incorrect team ID or car number, they will be allowed to participate in the remaining sessions, but will receive a drive-through penalty after the start of the race.
          <ol>
            <li>No penalties will be given to teams who had their car number taken away by a team that registered before them.</li>
          </ol>
        </li>
        <li>Any team that registers with the wrong car model or even registers with multiple teams will be disqualified from the event and refused entry to the qualifying and race sessions</li>
      </ol>
      <h3>9. Qualifying Sessions</h3>
      <ol class="rulebook-section">
        <li>Qualifying will be held in a 55 minute long open qualifying session, which will be split into three 15 minute long segments with 5 minute long breaks between each of these segments.
          <ol>
            <li>During the first 15 minute long segment, starting at the start of the qualifying session and ending at the 15 minute mark, only Grand Touring Challenge (GTC) teams may go on-track and qualify.</li>
            <li>During the second 15 minute long segment, starting at the 20 minute mark and ending at the 35 minute mark, only Grand Touring (GT) teams may go on-track and qualify.</li>
            <li>During the third 15 minute long segment, starting at the 40 minute mark and running until the end of the qualifying session, only Prototype (P) teams may go on-track and qualify.</li>
          </ol>
        </li>
        <li>Grand Touring (GT) and Prototype (P) teams may not leave the pit lane before the start of their class' qualifying segments. The signal that teams may leave the pit lane to go on-track and qualify will be given by the series administration via the in-game chat.</li>
        <li>Grand Touring Challenge (GTC) and Grand Touring (GT) teams may not start new laps after the end of their class' qualifying segments. The signal that teams may not start new laps and must return to the pit lane will be given by the series administration via the in-game chat.</li>
        <li>Any member of a team's driver roster will be allowed to drive the car during their car class' qualifying segment.</li>
        <li>During qualifying, all drivers on-track must be aware of their surroundings at all times. Any team found to be interfering with another team's qualifying laps in any way, may be penalised if the incident is reported to the series administration.</li>
        <li>The driver, who sets a team's fastest time during qualifying, is not required to start the car, but must complete at least 1 full lap during the race. This lap cannot start or end in the pit lane. </li>
        <li>Teams, who are observed to have left the pit lane outside their car class' qualifying segment by another team or the series administration, will receive a drive-through penalty after the start of the race.</li>
        <li>Teams, who do not set a time during qualifying must also start the race from the back of their car class. Should this be the case for multiple teams, they will be gridded in order of their fastest warm-up session times.</li>
        <li>The series administration may not allow a team or driver to take the start, if they’re deemed to be a potential danger to other cars on-track during the race.</li>
      </ol>
      <h3>10. Race Session</h3>
      <ol class="rulebook-section">
        <li>All races will utilise the standard rolling start procedure the iRacing software provides with the following alterations:
          <ol>
            <li>The class leaders of all supporting classes, both GT and GTC, should leave a gap of about 5 seconds to the last car of the class ahead of them on the pace lap.</li>
            <li>All cars and classes, meaning P, GT and GTC must ignore the "green flag" as displayed by iRacing and must remain in their grid formation while also keeping to the pace car speed. Frequent accelerating and braking as well as deviating too far from the pace car speed may be penalised.</li>
            <li>Only the leader of each class will be allowed to initiate the start of their categories’ race by starting to accelerate away from the field in the “starting zone”. Once he has done so, all cars of that class will be free to race. All classes will be subject to this procedure.</li>
            <li>Images of the exact beginning and end points of this “starting zone” will be part of the drivers’ briefing, which will be published before the first free practice session.</li>
            <li>Teams that start from pit lane must line up at pit exit in a line. They will not be allowed to leave the lane until the race administration declares the pit exit open once the last GTC car has passed the first turn. Leaving the pit lane early will result in a 15 second stop & hold penalty.</li>
          </ol>
        </li>
        <li>During the race itself, no driver will be allowed to complete more than 70% of a team's total number of completed laps.
          <ol>
            <li>Fractional amounts of laps will always be rounded to the closest full number.</li>
            <li>All laps beyond the 70% limit described in 10.b will be deducted from that driver's and team's total number of completed laps.</li>
          </ol>
        </li>
        <li>To make sure drivers don't take too many liberties with the track limits, an incident limit will be enforced during all races in the season. The incident limit for each round is listed below.
          <table class="table table-sm">
            <tr>
              <th>Event</th>
              <th>Incident Point Limit</th>
            </tr>
            <tr>
              <td>Round 1 (12 hours of Sebring)</td>
              <td>120 incident points</td>
            </tr>
            <tr>
              <td>Round 2 (4 hours of Monza)</td>
              <td>60 incident points</td>
            </tr>
            <tr>
              <td>Round 3 (6 hours of the Nürburgring)</td>
              <td>80 incident points</td>
            </tr>
            <tr>
              <td>Round 4 (4 hours of Silverstone)</td>
              <td>60 incident points</td>
            </tr>
            <tr>
              <td>Round 5 (4 hours of Interlagos</td>
              <td>60 incident points</td>
            </tr>
            <tr>
              <td>Round 6 (6 hours of Spa-Francorchamps)</td>
              <td>80 incident points</td>
            </tr>
            <tr>
              <td>Round 7 (8 hours of Road America)</td>
              <td>100 incident points</td>
            </tr>
          </table>
          <ol>
            <li>Any team exceeding the incident limits in the list above by 1 incident point will be given a drive-through penalty.</li>
            <li>Any team exceeding the incident limits in the list above by 31 incident points will be given a 15 second stop & hold penalty.</li>
            <li>The duration of the stop & hold penalty given will double at every 30 incident point milestone after that, meaning that a team will receive a 30 second & and hold penalty once they’ve exceeded the incident limit by 61 points, a 60 second stop & hold penalty once they’ve exceeded the incident limit by 91 points and so on. </li>
          </ol>
        </li>
      </ol>
      <h3>11. General Driving Conduct</h3>
      <ol class="rulebook-section">
        <li>All drivers must pass in a safe manner and respect their opponents. Both drivers must also take into account leaving room for lag. This applies to lapping manoeuvres just as much as to overtakes for race positions.</li>
        <li>Drivers will not be allowed to block and must choose their line ahead of a corner without moving under braking to cover off any attacks from their opponents (blocking meaning that you're reacting to line changes of the car behind to fend off any attempts of the car behind to get alongside).</li>
        <li>As this is a series with multiple car classes on-track at the same time, all of which have varying top speeds, braking performance and cornering capabilities, every driver is asked to take care of the previous two rules as well as always acting with common sense.
          <ol>
            <li>Lapping cars must at all times be aware of the fact that they are the ones who have to make the passes since they're the faster cars. They can't expect to always have the racing line when doing so and will have to be just that little bit more cautious every now and then to make sure they don't ruin another team's race along with their own.</li>
            <li>On the other side, all lapped drivers must make sure to always behave in a predictable manner. They should stick to the racing line where needed, but that doesn't at all mean that they can't cooperate should they find themselves in a situation where moving slightly off-line or braking slightly earlier will help a lapping car get by just that little bit sooner and faster, helping both cars in the process by losing less time on the race track.</li>
          </ol>
        </li>
        <li>Should someone go off the track, they have to make sure that the track is clear before rejoining the racing surface. Dangerous track re-entries or even causing an incident while you try to rejoin will result in penalties when reported to the series administration.</li>
        <li>Under a waved yellow flag, please make sure to pay attention to the road ahead as well as any potentially stationary or slowly moving cars next to or on the race track itself.</li>
      </ol>
      <h3>12. Race Stoppages</h3>
      <ol class="rulebook-section">
        <li>If the iRacing service fails during a race resulting in drivers being unable to join or stay connected to the racing server of if the server becomes unstable enough to potentially cause problems for drivers, the race will be stopped. Should this happen, the series administration will announce the race stoppage by announcing the "red flag" status via the in-game chat (if the session is still accessible) and on the series Discord server.</li>
        <li>The series administration will decide on how to treat the race stoppage on an individual basis,  depending on how much of the scheduled race time passed since the start of the race and also on whether there's still usable timing data left over to create a race result.
          <ol>
            <li>If a race has run for at least 75% of its advertised duration, the series administration may award full championship points based on the results of that race.</li>
            <li>If a race has run for at least 50% of its advertised duration, the series administration may award half championship points based on the results of that race.</li>
            <li> If less than 50% of the advertised duration has passed before the race was stopped via  the red flag, the result will not count towards any championships.</li>
          </ol>
        </li>
        <li>Whether an abandoned race that didn't run for at least 50% of its advertised duration is rescheduled, will be decided by the series administration based on the feedback from all teams competing in the current SCO season.</li>
      </ol>
      <h3>13. Protests</h3>
      <ol class="rulebook-section">
        <li>Teams may protest any incidents they were involved in or affected by. The only way to do so is by filing a protest via the series protest form at any point after the start of the race to a maximum of 2 hours after the event ending.
          <ol>
            <li>Incidents will be investigated at the earliest opportunity and will be judged by at least two different series administration members.</li>
            <li>The series administration will attempt to reach a verdict as quickly as possible, to ensure that as many of the protests as possible will result in the guilty parties being penalised during the race.</li>
            <li>Should the series administration not be able to reach a verdict during the race because there is too little time left in the race, the penalty (if applicable) will be converted to a post-race penalty.</li>
            <li>The verdicts of all post-race investigations will be published within 48 hours of the event’s conclusion.</li>
            <li>All protests and verdicts will be tracked in a spreadsheet and published once the results have been declared official.</li>
          </ol>
        </li>
        <li>Frivolous protests will be ignored. Should a team be found to repeatedly file such protests, they may be warned or even penalised for their actions.</li>
        <li>The start of every race will automatically be reviewed by the series administration to check whether there were jump starts or any other significant incidents.</li>
        <li>All protest verdicts are judgements of fact and cannot be appealed under any circumstances.</li>
      </ol>
      <h3>14. Penalties</h3>
      <ol class="rulebook-section">
        <li>There are several types of penalties that can be assigned following an investigation by the series administration. The list of possible penalties can be found below.
          <ul>
            <li>Warning</li>
            <li>Time Penalty</li>
            <li>Drive-Through Penalty</li>
            <li>Stop & Hold Penalty (minimum of 5 seconds)</li>
            <li>Lap Deductions</li>
            <li>Points Deductions</li>
            <li>Disqualifications</li>
            <li>Back of Grid Penalty for the following round(s)</li>
            <li>Exclusions from Multiple Events (may be assigned to a team or driver)</li>
          </ul>
          <ol>
            <li>When serving a drive-through penalty, the affected team must drive through the pit lane without making a pit stop. Should a team have to make a pit stop after being given a drive-through penalty, they may do so, but they’ll be required to return to the pit lane after their stop to serve the penalty.</li>
            <li>Any team receiving a drive-through or stop & hold penalty must serve said penalty within 3 laps of it being issued. Failure to serve a drive-through penalty within the prescribed amount of time will result in the affected team being no longer scored and disqualified from the session.</li>
            <li>Teams may combine stop & hold penalties with regular pit stops. If they choose to do so, iRacing will automatically add 25 seconds to the penalty time assigned to them by the series administration.</li>
          </ol>
        </li>
        <li>Repeat offenders will receive harsher penalties, should they be penalised for the same type of misbehaviour multiple times.</li>
        <li>Penalties can affect teams as well as drivers individually, meaning a team can just as easily be excluded from competition as individual drivers, depending on the severity of the rule violations they committed.</li>
        <li>The series administration also reserves itself the right to issue a team with a further penalty for the next event of the season, if a team does not serve a penalty they've been given during the race.</li>
        <li>All warnings and penalties that are issued during or after an event will be posted in the in-game chat and the list of submitted protests which will be linked in the #race-control channel of the series Discord and in the event briefing.</li>
      </ol>
      <h3>15. Race Classification & Championships</h3>
      <ol class="rulebook-section">
        <li>All teams, who start a race, fulfil the maximum driver lap share requirements and cover at least 75% of their respective class leader's driven distance, will be classified in their achieved overall race position in the official results.</li>
        <li>There will be 3 official championships in the series, one for each car class.
          <ol>
            <li>The SCO Prototype teams' championship title will be awarded to the P team which scores the most points throughout the whole season.</li>
            <li>The SCO Grand Touring teams' championship title will be awarded to the GT team which scores the most points throughout the whole season.</li>
            <li>The SCO Grand Touring Challenge teams' championship title will be awarded to the GTC team which scores the most points throughout the whole season.</li>
          </ol>
        </li>
        <li>All races will races will count towards every championship. There will be no dropped scores.</li>
        <li>Championship points will be awarded to all classified cars based on their finishing position within their car class in each event. Class points will be awarded using the following scale:
          <table class="table table-sm">
            <tr>
              <th>Class Position</th>
              <th>Points scored</th>
            </tr>
            <tr>
              <td>1<sup>st</sup></td>
              <td>25 points</td>
            </tr>
            <tr>
              <td>2<sup>nd</sup></td>
              <td>20 points</td>
            </tr>
            <tr>
              <td>3<sup>rd</sup></td>
              <td>16 points</td>
            </tr>
            <tr>
              <td>4<sup>th</sup></td>
              <td>13 points</td>
            </tr>
            <tr>
              <td>5<sup>th</sup></td>
              <td>11 points</td>
            </tr>
            <tr>
              <td>6<sup>th</sup></td>
              <td>10 points</td>
            </tr>
            <tr>
              <td>7<sup>th</sup></td>
              <td>9 points</td>
            </tr>
            <tr>
              <td>8<sup>th</sup></td>
              <td>8 points</td>
            </tr>
            <tr>
              <td>9<sup>th</sup></td>
              <td>7 points</td>
            </tr>
            <tr>
              <td>10<sup>th</sup></td>
              <td>6 points</td>
            </tr>
            <tr>
              <td>11<sup>th</sup></td>
              <td>5 points</td>
            </tr>
            <tr>
              <td>12<sup>th</sup></td>
              <td>4 points</td>
            </tr>
            <tr>
              <td>13<sup>th</sup></td>
              <td>3 points</td>
            </tr>
            <tr>
              <td>14<sup>th</sup></td>
              <td>2 points</td>
            </tr>
            <tr>
              <td>15<sup>th</sup></td>
              <td>1 point</td>
            </tr>
          </table>
        </li>
        <li>In the event of a tie in the points standings, the position in question will go to the team with the most race victories.
          <ol>
            <li>If neither team has a win or the same number of wins as the other tied team, the position will go to the team with the most second place finishes.</li>
            <li>If the same applies there, this procedure is continued until the tie can be broken. Should this not be possible, both teams will be classified in the same championship position.</li>
          </ol>
        </li>
        <li>Following the last round of the season, the top teams from each car class will receive automatic invites for the 2021-2022 SCO season. Invites will be awarded to the following teams:
          <ul>
            <li>Top 5 Prototype (P) championship teams</li>
            <li>Top 5 Grand Touring (GT) championship teams</li>
            <li>Top 5 Grand Touring Challenge (GTC) championship teams</li>
          </ul>
        </li>
        <li>The Clean X Challenge rewards those teams that drive the furthest and receive the fewest incident points. Each car class will have its own Clean X Challenge. All teams within a class will be ranked by their amount of Clean X points throughout the whole season.
          <ol>
            <li>Each team's Clean X score for the season will be calculated using the following formula:
              <ul>
                <li>X<sub>a</sub> - X<sub>b</sub> = X<sub>c</sub></li>
                <li>X<sub>a</sub>: Race laps covered by a team across the whole season</li>
                <li>X<sub>b</sub>: Race incident points earned by a team across the whole season</li>
                <li>X<sub>c</sub>: Team's season Clean X points score</li>
              </ul>
            </li>
            <li>Following the last round of the season, the cleanest teams from each car class will receive automatic invites for the 2021-2022 SCO season. Invites will be awarded to the following teams:
              <ul>
                <li>Clean X Challenge champion in Prototype (P)</li>
                <li>Clean X Challenge champion in Grand Touring (GT)</li>
                <li>Clean X Challenge champion in Grand Touring Challenge (GTC)</li>
              </ul>
            </li>
          </ol>
        </li>
      </ol>
      <h3>16. In-Game Session Settings</h3>
      <ol class="rulebook-section">
        <li>This section of the rulebook lists all in-game session settings that have not been brought up at an earlier point in this document.
          <ol>
            <li>All sessions will be hosted on the NL-Amsterdam server farm.</li>
            <li>Dynamic weather will be used in all sessions. Exceptions include pre-qualifying (should it happen) or other types of test sessions that require fewer variables for more accurate data.</li>
            <li>The track state will be always be set to “automatically generated” (except in pre-qualifying) at the beginning of a session and will carry over to the next sessions on race day. Marbles will be removed between sessions.</li>
            <li>Full course cautions as well as fast repairs will be disabled.</li>
            <li>All driving aids with the exceptions of clutch assists will be disallowed.</li>
            <li>The SimTime will always be set to the real life date of the race plus 6 months. The sim date and time of day will be carried over from session to session on race day. Roughly 5 minutes of in-game time will pass on each session transition.</li>
            <li>The Sun Acceleration Multiplier will be to set '1x' at all times.</li>
            <li>All cars in a class will be gridded together, meaning that cars from faster classes, that do not have a qualifying time, will receive a grid slot at the end of their class' field instead of the whole field.</li>
            <li>The Qualifying Conduct Scrutiny will be set to "Off" for all race day sessions.</li>
            <li>All cars will run without tyre limits.</li>
          </ol>
        </li>
      </ol>
      <h3>17. Contact Details and Communication</h3>
      <ol class="rulebook-section">
        <li>Should any questions arise, team managers, drivers and other persons can contact the series administration using the email address below. Responses to any questions about the regulations, team line-up changes or other inquiries will be sent within 24 hours of us receiving the original message.
          <span class="d-block text-center">Contact Email Address: <a class="btn btn-primary p-1" href="mailto:info@sportscaropen.eu"><i class="far fa-envelope"></i> info@sportscaropen.eu</a></span>
        </li>
        <li>The series administration will also use a Discord server during events, but can also be contacted there at all other points. The permanent invite link to the SCO Discord can be found below:
          <a href="https://discord.gg/ShfkyTe" class="btn btn-primary btn-block my-3"><i class="fab fa-discord"></i> https://discord.gg/ShfkyTe</a>
          <ol>
            <li>The series administration advises all team managers or other team members that are in contact with drivers on-track to be online on the series Discord during races. Generally, instructions will be given both in-game as well as on Discord, but there's always a chance that in the case of server issues, series administration members will be affected too, meaning they'll no longer be able to give instructions in-game and must resort to Discord only.</li>
          </ol>
        </li>
        <li>The use of the text and voice chat during qualifying and race sessions is forbidden. While occasional and accidental violations will not have any negative consequences, repeated offences will lead to penalties, especially if the message is intended to call out or insult another participant or series administration member.</li>
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
