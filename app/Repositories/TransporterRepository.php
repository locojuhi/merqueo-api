<?php

declare(strict_types = 1);

namespace App\Repositories;

use App\Repositories\Contracts\Repository;
use App\Models\Transporter;

class TransporterRepository extends Repository
{
    public function model()
    {
        return Transporter::class;
    }

    public function findTransporterWithPendingOrders($transporterId)
    {
        $transporter =  $this->model
            ->with(['orders' => function($query){
                $query->where('status', '=', 'pending');
            }])
            ->where('id', '=', $transporterId)
            ->get();
        return $transporter;
    }
}
