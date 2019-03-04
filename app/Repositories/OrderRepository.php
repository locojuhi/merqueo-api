<?php

namespace App\Repositories;

use App\Exceptions\ResourceNotFoundException;
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
     * @param null $transporterId
     * @return Order
     * @throws ResourceNotFoundException
     */
    public function findOderWithProducts($orderId, $transporterId = null ): Order
    {
        if (!empty($transporterId)) {
            $order = $this->model
                ->with(['products.product'])
                ->where('id', '=', $orderId)
                ->where('transporter_id', '=', $transporterId)
                ->first();
        } else {
            $order = $this->model
                ->with(['products.product'])
                ->where('id', '=', $orderId)
                ->first();
        }

        if (empty($order)) {
            throw new ResourceNotFoundException('message', 404);
        } else {
            return $order;
        }
    }
}
