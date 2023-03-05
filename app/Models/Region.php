<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Region extends Model
{
    use HasFactory;
    protected $table = "region";
    public $fillable = [
        'name',
        'description',

    ];
    
}
