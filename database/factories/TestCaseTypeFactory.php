<?php

use Faker\Generator as Faker;

$factory->define(App\TestCaseType::class, function (Faker $faker) {
    return [
        //
        'name' => "Test case ".$faker->name
    ];
});
