<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name', 'detail_link', 'price', 'main_cat', 'cat_link', 'screenshot', 'category', 'added', 'product_id', 'demo_link'
    ];

}
