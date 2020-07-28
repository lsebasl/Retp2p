<?php

namespace App;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'barcode',
        'name',
        'category',
        'model',
        'mark',
        'description',
        'units',
        'price',
        'discount',
        'status',
    ];

    /**
     * Relationship many invoices belong to many products
     *
     * @return BelongsToMany
     */
    public function invoices():BelongsToMany
    {
        Return $this->belongsToMany(Invoice::class);
    }
    /**
     *
     * @return BelongsToMany
     */
    public function User():BelongsToMany
    {
        Return $this->belongsToMany(Invoice::class);
    }

    /**
     * Get id in a specific product
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->getAttribute('id');

    }
    /**
     * Get category in a specific product
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->getAttribute('category');

    }

    /**
     * Get barcode in a specific product
     *
     * @return string|null
     */
    public function getBarcode(): ?string
    {
        return $this->getAttribute('barcode');
    }

    /**
     * * Get the name in a specific product
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getAttribute('name');
    }



    /**
     * Query Scope Name
     *
     * @param  Builder     $query
     * @param  string|null $name
     * @return Builder
     */
    public function scopeName(Builder $query, ? string $name):Builder
    {
        if(null !== $name) {
            return $query->where('name', 'LIKE', "$name%");
        }
        return $query;

    }

    /**
     * Query Scope Status
     *
     * @param  Builder $query
     * @param  $status
     * @return Builder
     */
    public function scopeStatus(Builder $query, ? string $status):Builder
    {
        if(null !== $status) {
            return $query->where('status', 'LIKE', "$status%");
        }
        return $query;

    }

    /**
     * Query Scope Mark
     *
     * @param  Builder $query
     * @param  $mark
     * @return Builder
     */
    public function scopeMark(Builder$query, ? string $mark):Builder
    {
        if(null !== $mark) {
            return $query->where('mark', 'LIKE', "$mark%");
        }
        return $query;

    }

    /**
     * Query Scope Mark
     *
     * @param  Builder     $query
     * @param  string|null $price
     * @return Builder
     */
    public function scopePrice(Builder$query, ? string $price):Builder
    {
        if(null !== $price) {
            return $query->where('price', '<=', $price);
        }
        return $query;

    }

    /**
     * Query Scope Sidebar Price
     *
     * @param Builder $query
     * @param string|null $price
     * @return Builder
     */
    public function scopeSidebarPrice(Builder$query, ? string $price):Builder
    {

        if($price == 5000) {
            return $query->where('price', '<=', 5000);
        }elseif ($price == 10000) {
            return $query->whereBetween('price', [5000,10000]);
        }
        elseif ($price == 20000) {
            return $query->whereBetween('price', [10000,20000]);
        }
        elseif ($price == 30000) {
            return $query->whereBetween('price', [20000,30000]);
        }
        else {
            return $query->where('price', '>', 30000);
        }


    }

    /**
     * Query Scope Category
     *
     * @param  Builder     $query
     * @param  string|null $category
     * @return Builder
     */
    public function scopeCategory(Builder$query, ? string $category):Builder
    {
        if(null !== $category) {
            return $query->where('category', 'LIKE', "$category%");
        }
        return $query;
    }

    /**
     * Query Scope Category
     *
     * @param  Builder     $query
     * @param  string|null $sidebar
     * @return Builder
     */
    public function scopeSearchByMark(Builder$query, ? string $sidebar):Builder
    {
        if(null !== $sidebar) {
            return $query->where('mark', '=', $sidebar);
        }
        return $query;
    }


}

