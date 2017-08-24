<?php

use App\Season;
use Illuminate\Database\Seeder;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Season::create([
          'start' => '2017-10-05',
          'end' => '2018-01-28'
        ]);
    }
}
