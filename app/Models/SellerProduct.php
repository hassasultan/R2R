<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SellerProduct extends Model
{
    use HasFactory;
    protected $table = "seller_product";
    public $fillable = [
        'product_id',
        'seller_id',
        'slug',
        'title',
        'condition_id',
        'stock',
        'price',
        'currency',
        'status',
        // 'slug',
        // 'product_id',
        // 'slug',
        // 'product_id',
        // 'slug',
        // 'product_id',
        // 'slug',

    ];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImg::class,'seller_product_id','id');
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class,'seller_id');
    }
    public function getstock()
    {
        return $this->belongsTo(Stock::class,'stock');
    }
    public function getcurrency()
    {
        return $this->belongsTo(Currency::class,'currency');
    }
    
}
