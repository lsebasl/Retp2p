<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public Function products()
    {
        return $this->hasMany(Product::class);
    }

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

