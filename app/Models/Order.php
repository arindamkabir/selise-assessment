<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function getShippingAddressAttribute()
    {
        return
            $this->line1 .
            (($this->line2) ? ', ' . $this->line2 : '') . ', ' .
            $this->city . ', ' .
            $this->zip_code;
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
