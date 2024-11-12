<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = [
        'quantity',
        'total',
        'product_id',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
