<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table="contact_info";
    public $timestamps=true;
    protected $fillable=[
        'user_id',
        'user_adress',
        'user_phone',
    ];
}
