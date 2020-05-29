<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public Function products()
    {
        return $this->hasMany(Product::class);
    }

}


