<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductImg;
use App\Models\Conditions;
use App\Models\PivotSeller;
use App\Models\Region;
use App\Models\PivotRegion;
use App\Models\Capacity;
use App\Models\PivotCapacity;
use App\Models\Color;
use App\Models\PivotColor;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'cat_id',
        'subcat_id',
        'slug',
        // 'seller_id',
        'brand_id',
        'condition_id',
        'name',
        'featured',
        'fea_img',
        'model',
        'region',
        'color',
        'capacity',
        'carrier',
        'description',
        'condition',
        'stock',
        'price',
        'is_bid',
        'bid_expire',
        'status',
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function seller()
    {
        return $this->belongsToMany(
            Seller::class,
            PivotSeller::class,
            'seller_id',
            'product_id',
        );
    }
    
    public function region()
    {
        return $this->belongsToMany(
            Region::class,
            PivotRegion::class,
            'product_id',
            'region_id',
        );
    }
    
    
    public function capacity()
    {
        return $this->belongsToMany(
            Capacity::class,
            PivotCapacity::class,
            'product_id',
            'capacity_id',
        );
    }
    public function SelectedCapacity($id)
    {
        $capacity = Capacity::find($id);
        return $capacity;
    }
    
    public function color()
    {
        return $this->belongsToMany(
            Color::class,
            PivotColor::class,
            'product_id',
            'color_id',
        );
    }
    public function SelectedColor($id)
    {
        $color = Color::find($id);
        return $color;
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcat_id','id');
    }
    // public function images()
    // {
    //     return $this->hasMany(ProductImg::class,'product_id','id');
    // }
    public function proCondition()
    {
        return $this->belongsTo(Conditions::class,'condition_id','id');
    }
    
    
}
