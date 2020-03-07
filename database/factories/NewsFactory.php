<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    $rand = random_int(2, 6);
    $list = '';
    for ($i=0;$i<$rand;$i++) {
        $list .= '+ '.$faker->name."\r\n";
    }
    return [
        //
        'title' => $faker->sentence,
        'teaser' => $faker->text,
        'body' => $faker->text."\r\n".'![image](https://loremflickr.com/1270/720 "Subtitle 1")'."\r\n".$faker->text."\r\n".'![image](https://loremflickr.com/1920/1080 "Subtitle 2")'."\r\n".$list,
        'image' => 'https://loremflickr.com/1600/900',
        'active' => $faker->randomElement([1,1,1,1,1,1,1,0]),
        'published' => $faker->dateTimeBetween('-2 weeks', '+2 weeks'),
    ];
});
