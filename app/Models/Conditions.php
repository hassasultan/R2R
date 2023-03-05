<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Conditions extends Model
{
    use HasFactory;
    protected $table = "condition";
    public $fillable = [
        'name',
        'status',

    ];
    public function product()
    {
        return $this->hasMany(Product::class,'id');
    }
    
}
