<?php

namespace App\Http\Controllers\Api;

use App\Services\Orders\OrderService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * OrderController constructor.
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @SWG\Get(
     *      path="/api/orders/{orderId}",
     *      tags={"Orders"},
     *      @SWG\Parameter(
     *          name="Content-Type",
     *          type="string",
     *          default="application/json",
     *          in="header",
     *          description="Application content type",
     *          required=false
     *      ),
     *      @SWG\Parameter(
     *          type="string",
     *          name="orderId",
     *          in="path",
     *          description="ID of the order that needs to be fetched",
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Ok"
     *      )
     * )
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->orderService->getAvailableProductsForAnOrder($id);
        return response($order);
    }

    /**
     * @SWG\Patch(
     *      path="/api/orders/{orderId}",
     *      tags={"Orders"},
     *      @SWG\Parameter(
     *          name="Content-Type",
     *          type="string",
     *          default="application/json",
     *          in="header",
     *          description="Application content type",
     *          required=false
     *      ),
     *      @SWG\Parameter(
     *          type="string",
     *          name="orderId",
     *          in="path",
     *          description="ID of the order that needs to be fetched",
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Ok"
     *      ),
     *      @SWG\Response(
     *          response=400,
     *          description="Lack of inventory"
     *      )
     * )
     * @param $orderId
     */
    public function dispatchOrder($orderId)
    {
        $this->orderService->dispatchOder($orderId);
    }
}
