<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Products\ProductsInventoryService;

class ProductController extends Controller
{
    /**
     * @var ProductsInventoryService
     */
    private $productsInventoryService;

    /**
     * ProductController constructor.
     * @param ProductsInventoryService $productsInventoryService
     */
    public function __construct(ProductsInventoryService $productsInventoryService)
    {
        $this->productsInventoryService = $productsInventoryService;
    }

    /**
     * Display a listing of the resource.
     * @SWG\Get(
     *     path="/api/products",
     *     summary="Get an inventory list for the products",
     *     tags={"Inventory"},
     *     @SWG\Parameter(
     *          name="Content-Type",
     *          type="string",
     *          default="application/json",
     *          in="header",
     *          description="Application content type",
     *          required=false
     *     ),
     *     @SWG\Response(
     *          response=200,
     *          description="ok"
     *     )
     * )
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = $this->productsInventoryService->getProductsInventoryList();
        return response(compact('inventories'));
    }
}
