<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    /**
     * @var \App\Repositories\ProductRepository
     */
    private $productRepository;

    /**
     * @var \App\Repositories\ProductRepository
     */
    private $orderRepository;

    public function __construct()
    {
        $this->productRepository = resolve(\App\Repositories\ProductRepository::class);
        $this->orderRepository = resolve(\App\Repositories\OrderRepository::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = $this->productRepository->findAll();
        $orders = $this->orderRepository->findAll();

        foreach ($orders as $order) {
            DB::table('order_products')->insert([
                'order_id' => $order->id,
                'product_id' => mt_rand(1, count($products)),
                'quantity' => mt_rand(1, 100)
            ]);

        }
    }
}
