<?php

use App\Setting;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create([
          'key' => 'facebookentries',
          'value' => '3'
        ]);
        Setting::create([
          'key' => 'facebookpageid',
          'value' => '1410896599004864'
        ]);
        Setting::create([
          'key' => 'freeze_teams',
          'value' => '0'
        ]);
        Setting::create([
          'key' => 'registration',
          'value' => 'open'
        ]);
        Setting::create([
          'key' => 'session_password',
          'value' => 'p455w0rd'
        ]);
        Setting::create([
          'key' => 'session_password_active',
          'value' => '0'
        ]);
        Setting::create([
          'key' => 'show_youtube_header',
          'value' => '0'
        ]);
        Setting::create([
          'key' => 'twitteraccount',
          'value' => 'https://twitter.com/SportsCarOpen'
        ]);
        Setting::create([
          'key' => 'youtube_header_videoid',
          'value' => 'NiVy5dYr41Q'
        ]);
    }
}
