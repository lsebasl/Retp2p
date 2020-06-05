<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Product extends Model
{
    protected $fillable = [
        'barcode',
        'name',
        'category',
        'model',
        'description',
        'units',
        'price',
        'discount',
        'status',
    ];
    public function invoices()
    {
        Return $this->belongsToMany(Invoice::class);
    }
    public function stocks()
    {
        Return $this->belongsTo(Stock::class);
    }
}
