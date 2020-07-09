<?php

namespace App;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Query\Builder;
use phpDocumentor\Reflection\Types\Object_;


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
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->getAttribute('id');
    }


    /**
     * Scope
     *
     * @param $query
     * @param $name
     *
     */
    public function scopeName($query, $name)
    {
        if($name){
            return $query->where('name','LIKE',"$name%");
        }
        return $query;
    }
}
