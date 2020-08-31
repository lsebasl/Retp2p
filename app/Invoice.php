<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    protected $fillable = [
        'users_id',
        'expedition_date',
        'expiration_date',
        'subtotal',
        'Vat',
        'total',
        'product_id',
        'quantity',
    ];

    /**
     * Many products has many invoices.
     *
     * @return BelongsToMany
     */
    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('product_id','quantity');
    }

    /**
     * Relationship many invoices belong to client.
     *
     * @return BelongsTo
     */
    public function clients():BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Relationship many invoices belong to user.
     *
     * @return BelongsTo
     */
    public function users():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation between invoices and Payment Attempts
     *
     * @return BelongsToMany
     */
    public function PaymentAttempt():BelongsToMany
    {
        return $this->belongsToMany(PaymentAttempt::class)->withPivot('requestId', 'processUrl', 'status');
    }
}
