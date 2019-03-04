<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    public function inventory()
    {
        return $this->hasMany('App\Models\Inventory');
    }
}
