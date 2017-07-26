<?php

use App\Team;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Team::create([
          'user_id' => 1,
          'season_id' => 1,
          'name' => 'Generic Simracing',
          'number' => 23,
          'car' => 1,
          'status' => 0,
        ]);
    }
}
