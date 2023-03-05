<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Color extends Model
{
    use HasFactory;
    protected $table = "color";
    public $fillable = [
        'name',
        'description',

    ];
    
}
