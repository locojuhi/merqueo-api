<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Order::class, function (Faker $faker) {
    $orderStatus = ['pending', 'dispatched'];
    return [
        'status' => $orderStatus[mt_rand(0, 1)],
        'transporter_id' => mt_rand(1, 50)
    ];
});
