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
     * @return BelongsToMany
     */
    public function invoices():BelongsToMany
    {
        Return $this->belongsToMany(Invoice::class);
    }
    /**
     * @return BelongsToMany
     */
    public function User():BelongsToMany
    {
        Return $this->belongsToMany(Invoice::class);
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->getAttribute('id');

    }

    /**
     * @return string|null
     */
    public function getBarcode(): ?string
    {
        return $this->getAttribute('barcode');
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
}
