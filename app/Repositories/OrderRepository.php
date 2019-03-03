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

    public function findOderWithProducts($orderId)
    {
        $order = $this->model
            ->with(['products.product'])
            ->where('id', '=', $orderId)
            ->get();
        ;

        return $order;
    }
}