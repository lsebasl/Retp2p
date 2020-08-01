<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\facades\Cache;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name' ,
    ];

    /**
     * Obtain cache marks
     *
     * @return Collection
     */
    public function getCacheCategory():Collection
    {
        return Cache::remember(
            'category',
            now()->addDay(),
            function () {
                return $this->all();
            }
        );
    }
}
