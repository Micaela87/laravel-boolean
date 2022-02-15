<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Postcard;
use Faker\Generator as Faker;

$factory->define(Postcard::class, function (Faker $faker) {
    return [
        'sender' => $faker -> word(),
        'address' => $faker -> word(),
        'text' => $faker -> word()
    ];
});
