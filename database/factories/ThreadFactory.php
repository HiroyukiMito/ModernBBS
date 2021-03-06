<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Thread::class, function (Faker $faker) {
    return [
            'category_id' => $faker->numberBetween(1,6),
            'user_id' => $faker->numberBetween(1,2),
            'thread_title' => 'test',
            'body' => 'testtest',
    ];
});
