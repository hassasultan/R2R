<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Brand extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'slug',
        'description',
        'avatar',

    ];
    
}
