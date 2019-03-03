<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Repositories\Contracts\Repository;
use App\Models\Warehouse;


class WarehouseRepository extends Repository
{
    public function model()
    {
        return Warehouse::class;
    }

}