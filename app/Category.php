<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\facades\Cache;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name' ,
    ];

    /**
     * Relationship many invoices belong to many products.
     *
     * @return BelongsToMany
     */
    public function category():BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Obtain cache marks
     *
     * @return Collection
     */
    public function getCacheCategory():Collection
    {
        return Cache::remember(
            'categories',
            now()->addDay(),
            function () {
                return $this->all();
            }
        );
    }

    public function getId()
    {
        return $this->getAttribute('id');
    }
}
