<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\OrderProduct::class, function (Faker $faker) {
    return [
        'order_id' => mt_rand(1, 50),
        'product_id' => mt_rand(1, 36),
        'quantity' => mt_rand(1, 100),
    ];
});
