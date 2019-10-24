<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = "roles";
    public $timestamps=true;

    protected $fillable=[
        'title',
        'order',
    ];
}
