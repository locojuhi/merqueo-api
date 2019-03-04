<?php

namespace App\Repositories;

use App\Repositories\Contracts\Repository;
use App\Models\Order;


class OrderRepository extends Repository
{

    public function model()
    {
        return Order::class;
    }

    /**
     * @param $orderId
     * @return Order
     */
    public function findOderWithProducts($orderId): Order
    {
        $order = $this->model
            ->with(['products.product'])
            ->where('id', '=', $orderId)
            ->first();
        ;

        return $order;
    }
}