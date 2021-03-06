<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
          'name' => 'Admin',
          'email' => env('MAIL_FROM_ADDRESS','your@mail.here'),
          'password' => bcrypt('admin'),
          'isAdmin' => 1
        ]);
    }
}
