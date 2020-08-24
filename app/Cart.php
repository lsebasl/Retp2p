<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    protected $fillable = [
        'quantity','user_id','product_id','price','subtotal'
    ];

    /**
     * Relationship many invoices belong to client.
     *
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship a shopping cart has many products.
     *
     * @return BelongsTo
     */
    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relationship a shopping cart has many products.
     *
     *
     */
    public function sumPrice()
    {
       //
    }


}
