<?php

declare(strict_types = 1);

namespace App\Services\Seeders;


class ProductsService
{
    /**
     * @param $ordersData
     * @return array
     */
    public static function getProductList($ordersData)
    {
        $productList = [];
        foreach ($ordersData->orders as $order) {
            foreach($order->products as $product) {
                $productList[$product->id] = (object) [
                    'name' => $product->name
                ];
            }
        }
        ksort($productList);
        return $productList;
    }
}