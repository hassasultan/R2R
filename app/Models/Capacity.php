<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Capacity extends Model
{
    use HasFactory;
    protected $table = "capacity";
    public $fillable = [
        'name',
        'description',

    ];
    
}
