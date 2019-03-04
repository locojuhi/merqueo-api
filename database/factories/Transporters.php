<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Transporter::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
