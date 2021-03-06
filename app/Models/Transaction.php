<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'product_id', 'txn_id', 'amount', 'multi', 'payment_type', 'response', 'payment_status'
    ];

    /**
     * Get the products that owns the transaction.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'productId');
    }

}
