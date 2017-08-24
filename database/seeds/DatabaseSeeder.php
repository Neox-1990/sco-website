<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(DriversTableSeeder::class);
        $this->call(SeasonsTableSeeder::class);
        $this->call(DriverTeamTableSeeder::class);
    }
}
