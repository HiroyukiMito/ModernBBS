<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Thread::class, function (Faker $faker) {
    return [
            'category_id' => $faker->numberBetween(1,9),
            'thread_profile_id' => $faker->numberBetween(1,3),
            'thread_title' => 'test',
            'body' => 'testtest',
    ];
});
