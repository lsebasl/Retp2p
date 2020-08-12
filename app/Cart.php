<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $fillable = [
        'name','quantity','price','user_id'
    ];

    /**
     *
     *
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        $this->belongsTo(User::class);
    }
}
