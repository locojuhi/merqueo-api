<?php

declare(strict_types = 1);

namespace App\Services\Products;

use App\Repositories\InventoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductsInventoryService
{
    /**
     * @var ProductRepository
     */
    public $productRepository;

    /**
     * @var InventoryRepository
     */
    public $inventoryRepository;


    /**
     * ProductsInventoryService constructor.
     * @param ProductRepository $productRepository
     * @param InventoryRepository $inventoryRepository
     */
    public function __construct(
        ProductRepository $productRepository,
        InventoryRepository $inventoryRepository
    ) {
        $this->productRepository = $productRepository;
        $this->inventoryRepository = $inventoryRepository;
    }

    /**
     * @return Collection
     */
    public function getProductsInventoryList(): Collection
    {
        return $this->inventoryRepository->findProductsInventoryList();
    }
}
