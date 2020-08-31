<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'barcode',
        'name',
        'model',
        'mark',
        'description',
        'units',
        'price',
        'discount',
        'status',
        'category_id',
    ];

    /**
     * Relationship many invoices belong to many products.
     *
     * @return BelongsToMany
     */
    public function invoices():BelongsToMany
    {
        return $this->belongsToMany(Invoice::class)->withPivot('product_id','quantity');
    }

    /**
     * Relationship one product belongs to one category.
     *
     * @return BelongsTo
     */
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship many products belong to one shopping cart.
     *
     * @return HasMany
     */
    public function cart():HasMany
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Relationship many invoices belong to many products.
     *
     * @return BelongsToMany
     */
    public function User():BelongsToMany
    {
        return $this->belongsToMany(Invoice::class);
    }

    /**
     * Get id in a specific product.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->getAttribute('id');
    }

    /**
     * Get category in a specific product.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->getAttribute('category_id');
    }

    /**
     * Get description in a specific product.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->getAttribute('description');
    }

    /**
     * Get units in a specific product.
     *
     * @return string|null
     */
    public function getUnits(): ?string
    {
        return $this->getAttribute('units');
    }
    /**
     * Get price in a specific product.
     *
     * @return string|null
     */
    public function getPrice()
    {
        return $this->getAttribute('price');
    }
    /**
     * Get discount in a specific product.
     *
     * @return string|null
     */
    public function getDiscount()
    {
        return $this->getAttribute('discount');
    }
    /**
     * Get status in a specific product.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * Get model in a specific product.
     *
     * @return string|null
     */
    public function getModel()
    {
        return $this->getAttribute('model');
    }

    /**
     * Get barcode in a specific product.
     *
     * @return string|null
     */
    public function getBarcode(): ?string
    {
        return $this->getAttribute('barcode');
    }

    /**
     * * Get the name in a specific product.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getAttribute('name');
    }

    /**
     * Query Scope Name.
     *
     * @param  Builder     $query
     * @param  string|null $name
     * @return Builder
     */
    public function scopeName(Builder $query, ? string $name):Builder
    {
        if (null !== $name) {
            return $query->where('name', 'LIKE', "$name%");
        }
        return $query;
    }

    /**
     * Query Scope Status.
     *
     * @param  Builder $query
     * @param  $status
     * @return Builder
     */
    public function scopeStatus(Builder $query, ? string $status):Builder
    {
        if (null !== $status) {
            return $query->where('status', 'LIKE', "$status%");
        }
        return $query;
    }

    /**
     * Query Scope Mark.
     *
     * @param  Builder $query
     * @param  $mark
     * @return Builder
     */
    public function scopeMark(Builder$query, ? string $mark):Builder
    {

        if (null !== $mark) {
            return $query->where('mark', 'LIKE', "$mark%");
        }
        return $query;
    }

    /**
     * Query Scope Price.
     *
     * @param  Builder     $query
     * @param  string|null $price
     * @return Builder
     */
    public function scopePrice(Builder$query, ? string $price):Builder
    {
        if ($price == 5000) {
            return $query->where('price', '<=', 5000);
        } elseif ($price == 10000) {
            return $query->whereBetween('price', [5000,10000]);
        } elseif ($price == 20000) {
            return $query->whereBetween('price', [10000,20000]);
        } elseif ($price == 30000) {
            return $query->whereBetween('price', [20000,30000]);
        } elseif ($price == 31000) {
            return $query->where('price', '>', 30000);
        } elseif (null !== $price) {
            return $query->where('price', '<=', $price);
        }
        return $query;
    }

    /**
     * Query Scope Category.
     *
     * @param  Builder     $query
     * @param  string|null $category
     * @return Builder
     */
    public function scopeCategory(Builder$query, $category):Builder
    {
        if (null !== $category) {
            return $query->where('category_id', 'LIKE', "$category%");
        }
        return $query;
    }

    /**
     * Query Scope SearchByMark.
     *
     * @param  Builder     $query
     * @param  string|null $sidebar
     * @return Builder
     */
    public function scopeSearchByMark(Builder$query, ? string $sidebar):Builder
    {
        if (null !== $sidebar) {
            return $query->where('mark', '=', $sidebar);
        }
        return $query;
    }
}
