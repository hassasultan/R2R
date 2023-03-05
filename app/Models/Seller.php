<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id',
        'brand_name',
        'nie_num',
        'web_url',
        'social_media',
        'company_name',
        'contact_person_name',
        'person_designation',
        'source',
        'contact_number',
        'contact_email',
        'billing_address',
        'permanent_address',
        'country',
        'state',
        'city',
        'postal',
        'dob',
        'accept_policy',
        'wallet',
        'status',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->where('role',"seller");
    }
}
