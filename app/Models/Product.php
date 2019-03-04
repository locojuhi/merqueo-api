<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function inventory()
    {
        return $this->hasOne('App\Models\Inventory');
    }

    public function orders() {
        return $this->belongsToMany(Order::class)->using(OrderProduct::class)->withPivot(['quantity']);
    }
}
