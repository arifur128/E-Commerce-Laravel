<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

protected $fillable = [
    'user_id', 'order_number', 'total_amount', 'status',
    'customer_name', 'customer_email', 'customer_phone', 'shipping_address',
    'payment_method', 'transaction_id', 'note'
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    
}