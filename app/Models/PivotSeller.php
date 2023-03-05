<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Seller;
use App\Models\Product;

class PivotSeller extends Model
{
    use HasFactory;
    protected $table = "pivot_seller_product";
    public $fillable = [
        'seller_id',
        'product_id',
        'status',

    ];
    public function product()
    {
        return $this->belongs(Product::class,'product_id','id');
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class,'seller_id','id');
    }
    
}
