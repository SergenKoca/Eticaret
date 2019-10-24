<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPropertyModel extends Model
{
    protected $table="category_property_v2";
    public $timestamps=true;
    protected $fillable=[
      'main_category_id',
      'sub_category_1_id',
      'sub_category_2_id',
      'main_property_id'
    ];
}
