<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    /**
     * Many products has many invoices.
     *
     * @return HasMany
     */
    public function products():HasMany
    {
        return $this->hasMany(Product::class);
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
}
