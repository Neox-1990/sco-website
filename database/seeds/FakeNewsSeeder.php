<?php

use Illuminate\Database\Seeder;

class FakeNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\News::class, 20)->create();
    }
}
