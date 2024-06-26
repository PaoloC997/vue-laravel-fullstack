<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Vegetables;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'product_name', 'product_price', 'product_quantity', 'product_total'];

    public function order()
    {
        return $this->belongsTo(Order::class);

    }

    public function vegetables()
    {
        return $this->belongsTo(Vegetables::class);
    }
}
