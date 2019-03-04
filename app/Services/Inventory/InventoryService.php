<?php

declare(strict_types = 1);

namespace App\Services\Inventory;

use App\Exceptions\BadRequestException;
use App\Repositories\InventoryRepository;

class InventoryService
{
    /**
     * @var InventoryRepository
     */
    private $inventoryRepository;

    /**
     * InventoryService constructor.
     * @param InventoryRepository $inventoryRepository
     */
    public function __construct(InventoryRepository $inventoryRepository)
    {
        $this->inventoryRepository = $inventoryRepository;
    }

    /**
     * @param $productId
     * @return int
     * @throws BadRequestException
     */
    public function getCurrentInventoryForProduct($productId): int
    {
        $inventory = $this->inventoryRepository->find($productId);
        if (empty($inventory)) {
            //TODO: Use translator
            throw new BadRequestException('message');
        } else {
            return $inventory->quantity;
        }
    }

    public function isSupplyNeededForAProduct($productId, $quantityRequested): bool
    {
        $response = false;

        $onStock = $this->getCurrentInventoryForProduct($productId);

        if ($onStock < $quantityRequested) {
            $response = true;
        }

        return $response;
    }

    public function getInventoryFromAProduct($productId)
    {
        return $this->inventoryRepository->findOneBy([
            'product_id' => $productId
        ]);
    }
}
