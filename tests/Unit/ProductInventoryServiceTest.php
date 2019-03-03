<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\ProductRepository;
use App\Services\Products\ProductsInventoryService;

class ProductInventoryServiceTest extends TestCase
{
    /**
     * @var ProductsInventoryService
     */
    private $productsInventoryService;

    /**
     * ProductInventoryServiceTest constructor.
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->productsInventoryService = resolve(ProductsInventoryService::class);
    }

    /**
     * The repository should be instance of ProductRepository class
     *
     * @return void
     */
    public function testThatTheProductRepositoryAttrIsInstanceOfProductRepository()
    {
        $this->assertInstanceOf(ProductRepository::class, $this->productsInventoryService->productRepository);
    }


    public function testGetProductsInventoryList()
    {
        $productsWithInventory = $this->productsInventoryService->getProductsInventoryList();
        $this->assertInstanceOf(Collection::class, $productsWithInventory);
    }
}
