<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    public function transporter()
    {
        return $this->belongsTo(Transporter::class);
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
