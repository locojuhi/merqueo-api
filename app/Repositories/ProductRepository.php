<?php

declare(strict_types = 1);

namespace App\Repositories;

use App\Repositories\Contracts\Repository;
use App\Models\Product;

class ProductRepository extends Repository
{
    public function model()
    {
        return Product::class;
    }
}
