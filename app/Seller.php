<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

}
