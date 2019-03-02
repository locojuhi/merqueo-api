<?php

declare(strict_types = 1);

namespace App\Repositories;

use App\Repositories\Contracts\Repository;
use App\Models\Inventory;

class InventoryRepository extends Repository
{
    public function model()
    {
        return Inventory::class;
    }
}
