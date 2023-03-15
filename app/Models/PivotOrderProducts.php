<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotOrderProducts extends Model
{
    use HasFactory;
    protected $table = "pivot_order_products";
    protected $fillable = [
        "order_id",
        "seller_product_id",
        "quantity",
        "status",
    ];
    public function seller_product()
    {
        return $this->belongsTo(SellerProduct::class,'seller_product_id','id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
