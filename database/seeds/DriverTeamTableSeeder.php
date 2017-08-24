<?php

use Illuminate\Database\Seeder;

class DriverTeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('driver_team')->insert([
          'driver_id' => 1,
          'team_id' => 1
        ]);
        DB::table('driver_team')->insert([
          'driver_id' => 2,
          'team_id' => 1
        ]);
    }
}
