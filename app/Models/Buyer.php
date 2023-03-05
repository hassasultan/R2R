<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Buyer extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'company_name',
        'contact_person_name',
        'person_designation',
        'contact_number',
        'contact_email',
        'social_media',
        'website',
        'source',
        'address_one',
        'address_two',
        'address_three',
        'city',
        'state',
        'postal',
        'country',
        'short_description',
        'status',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->where('role',"buyer");
    }
}
