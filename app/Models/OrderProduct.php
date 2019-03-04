<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\Inventory\InventoryService;

class OrderProduct extends Model
{
    /**
     * @var InventoryService
     */
    private $inventoryService;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->inventoryService = resolve(InventoryService::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getOnStockAttribute()
    {
        return $this->inventoryService->getCurrentInventoryForProduct($this->product_id);
    }

    public function getSupplyNeededAttribute()
    {
        return $this->inventoryService->isSupplyNeededForAProduct($this->product_id, $this->quantity);
    }


}
