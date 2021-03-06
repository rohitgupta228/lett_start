<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'user_id', 'username', 'rating', 'comments'
    ];

}
