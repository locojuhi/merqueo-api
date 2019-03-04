<?php

namespace Tests\Integration;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsInventory extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testProductsInventoryRequestIsSuccess()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testProductsInventoryRequestContainsDataOnPayload()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
        $responseDecoded = json_decode($response->content());
        $this->assertObjectHasAttribute('inventories', $responseDecoded);
    }
}
