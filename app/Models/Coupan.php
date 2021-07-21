<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupan extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'coupan_code', 'discount_percent', 'coupan_description'
    ];


}
