<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ProductImg extends Model
{
    use HasFactory;
    protected $table = "product_img";
    public $fillable = [
        'seller_product_id',
        'image',

    ];
    
}
