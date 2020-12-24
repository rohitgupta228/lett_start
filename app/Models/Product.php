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
        'productId', 'name', 'packageName', 'oneLinerDesc', 'detailLink', 'price', 'mainCat', 'catLink', 'demolink', 'docLink', 'screenshot', 'category', 'added', 'screenshotDir', 'liveDemoBaseStr', 'overviewHTML', 'highlight1', 'highlight2', 'techUsed', 'themeFacts', 'screenshots', 'initialLog', 'changeLog'
    ];

    /**
     * Get the transactions that owns the product.
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'product_id', 'productId');
    }

}
