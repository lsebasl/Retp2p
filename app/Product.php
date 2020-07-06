<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Product extends Model
{
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
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->getAttribute('id');
    }

}
