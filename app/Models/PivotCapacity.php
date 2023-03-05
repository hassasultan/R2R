<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Seller;
use App\Models\Product;

class PivotCapacity extends Model
{
    use HasFactory;
    protected $table = "pivot_product_capacity";
    public $fillable = [
        'capacity_id',
        'product_id',
        // 'status',

    ];
    // public function product()
    // {
    //     return $this->belongs(Product::class,'product_id','id');
    // }
    // public function seller()
    // {
    //     return $this->belongsTo(Seller::class,'seller_id','id');
    // }
    
}
