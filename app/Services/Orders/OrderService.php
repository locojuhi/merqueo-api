<?php

declare(strict_types = 1);

namespace App\Services\Orders;

use App\Exceptions\BadRequestException;
use App\Repositories\OrderRepository;
use App\Services\Inventory\InventoryService;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderService
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * @var InventoryService
     */
    private $inventoryService;

    /**
     * OrderService constructor.
     * @param OrderRepository $orderRepository
     * @param InventoryService $inventoryService
     */
    public function __construct(
        OrderRepository $orderRepository,
        InventoryService $inventoryService
    ){
        $this->orderRepository = $orderRepository;
        $this->inventoryService = $inventoryService;
    }

    public function getAvailableProductsForAnOrder($orderId)
    {
        $order = $this->orderRepository->findOderWithProducts($orderId);

        foreach ($order->products as $orderProduct) {
            $orderProduct->append('on_stock')->toArray();
            $orderProduct->append('supply_needed')->toArray();
        }
        return $order;
    }

    public function dispatchOder($orderId)
    {
        $order = $this->getAvailableProductsForAnOrder($orderId);
        DB::transaction(function() use ($order){
            $order->status = 'dispatched';
            $order->save();

            try {
                foreach ($order->products as $orderProduct) {
                    $orderQuantity = $orderProduct->quantity;
                    $productInventory = $this->inventoryService->getInventoryFromAProduct($orderProduct->product->id);

                    $productInventory->quantity = $productInventory->quantity - $orderQuantity;

                    if ($productInventory->quantity < 0) {
                        //TODO: Use translator
                        throw new BadRequestException('message', 400);
                    } else {
                        $productInventory->save();
                    }
                }
            }catch (\Exception $exception) {
                //TODO: Use translator
                throw new BadRequestException('message', 400);
            }
        });
    }
}
