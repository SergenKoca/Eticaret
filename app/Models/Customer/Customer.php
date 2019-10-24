<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $table="customers";
    public $timestamps=true;
    protected $fillable=[
        'name','email','password',
    ];

    protected $hidden=[
        'password',
    ];
}
