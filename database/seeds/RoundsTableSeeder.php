<?php

use App\Round;
use Illuminate\Database\Seeder;

class RoundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Round::create([
          'number' => 1,
          'season_id' => 1,
          'combo' => '4 hours of the Nürburgring#Nürburgring Grand-Prix-Strecke - BES/WEC#Morning',
          'fp1_start' => '2017-10-5 17:00:00',
          'fp1_minutes' => 240,
          'fp2_start' => '2017-10-6 17:00:00',
          'fp2_minutes' => 240,
          'warmup_start' => '2017-10-8 13:00:00',
          'warmup_minutes' => 105,
          'qual_start' => '2017-10-8 14:45:00',
          'qual_minutes' => 15,
          'race_start' => '2017-10-8 15:00:00',
          'race_minutes' => 240,
        ]);
        Round::create([
          'number' => 2,
          'season_id' => 1,
          'combo' => '4 hours of Monza#Autodromo Nationale Monza - Grand Prix#Afternoon',
          'fp1_start' => '2017-11-2 17:00:00',
          'fp1_minutes' => 240,
          'fp2_start' => '2017-11-3 17:00:00',
          'fp2_minutes' => 240,
          'warmup_start' => '2017-11-5 13:00:00',
          'warmup_minutes' => 105,
          'qual_start' => '2017-11-5 14:45:00',
          'qual_minutes' => 15,
          'race_start' => '2017-11-5 15:00:00',
          'race_minutes' => 240,
        ]);
        Round::create([
          'number' => 3,
          'season_id' => 1,
          'combo' => '4 hours of Spa-Francorchamps#Circuit de Spa-Francorchamps - Grand Prix Pits#Night',
          'fp1_start' => '2017-11-30 17:00:00',
          'fp1_minutes' => 240,
          'fp2_start' => '2017-12-1 17:00:00',
          'fp2_minutes' => 240,
          'warmup_start' => '2017-12-3 13:00:00',
          'warmup_minutes' => 105,
          'qual_start' => '2017-12-3 14:45:00',
          'qual_minutes' => 15,
          'race_start' => '2017-12-3 15:00:00',
          'race_minutes' => 240,
        ]);
        Round::create([
          'number' => 4,
          'season_id' => 1,
          'combo' => '4 hours of the Americas#Circuit of the Americas - Grand Prix#Late Afternoon',
          'fp1_start' => '2018-1-4 17:00:00',
          'fp1_minutes' => 240,
          'fp2_start' => '2018-1-5 17:00:00',
          'fp2_minutes' => 240,
          'warmup_start' => '2018-1-7 13:00:00',
          'warmup_minutes' => 105,
          'qual_start' => '2018-1-7 14:45:00',
          'qual_minutes' => 15,
          'race_start' => '2018-1-7 15:00:00',
          'race_minutes' => 240,
        ]);
        Round::create([
          'number' => 5,
          'season_id' => 1,
          'combo' => '4 hours of Sao Paulo#Autodromo Jose Carlos Pace - Grand Prix#Late Afternoon',
          'fp1_start' => '2018-1-25 17:00:00',
          'fp1_minutes' => 240,
          'fp2_start' => '2018-1-26 17:00:00',
          'fp2_minutes' => 240,
          'warmup_start' => '2018-1-28 13:00:00',
          'warmup_minutes' => 105,
          'qual_start' => '2018-1-28 14:45:00',
          'qual_minutes' => 15,
          'race_start' => '2018-1-28 15:00:00',
          'race_minutes' => 240,
        ]);
    }
}
