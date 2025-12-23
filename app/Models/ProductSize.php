<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'size', 'stock', 'price_adjustment'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}