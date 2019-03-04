<?php

declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Provider;
use App\Repositories\Contracts\Repository;

class ProviderRepository extends Repository
{
    public function model()
    {
        return Provider::class;
    }
}
