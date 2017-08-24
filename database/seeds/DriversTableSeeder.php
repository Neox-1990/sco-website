<?php

use App\Driver;
use Illuminate\Database\Seeder;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver::create([
            'name' => 'John Doe',
            'iracing_id' => '123',
            'safetyrating' => 'B@3.00',
            'irating' => 2000
          ]);

        Driver::create([
            'name' => 'Foo Bar',
            'iracing_id' => '321',
            'safetyrating' => 'B@3.00',
            'irating' => 2000
          ]);
    }
}
