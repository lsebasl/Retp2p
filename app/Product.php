<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Product extends Model
{
    public function invoices()
    {
        Return $this->belongsToMany(Invoice::class);
    }
}
