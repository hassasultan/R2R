<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class WishList extends Model
{
    use HasFactory;
    protected $table = "wish_list";
    public $fillable = [
        'product_id',
        'user_id',
        'status',

    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    
}
