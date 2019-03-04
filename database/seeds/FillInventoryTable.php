<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\Repositories\ProductRepository;
use \App\Repositories\InventoryRepository;

class FillInventoryTable extends Seeder
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var InventoryRepository
     */
    private $inventoryRepository;

    /**
     * FillInventoryTable constructor.
     */
    public function __construct()
    {
        $this->productRepository = resolve(ProductRepository::class);
        $this->inventoryRepository = resolve(InventoryRepository::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = $this->productRepository->findAll();
        foreach ($products as $product) {
            $this->inventoryRepository->create([
                'warehouse_id' => 1,
                'product_id' => $product->id,
                'quantity' => mt_rand(0, 100)
            ]);
        }
        //TODO: Create the seeders but must to implements products repository first.
    }
}
