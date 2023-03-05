<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = "sub_category";
    public $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'avatar',

    ];
    
}
