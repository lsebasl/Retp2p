<?php

namespace App\Metrics;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class StockByCategory implements MetricsContract
{
    /**
     * Create collection of stock by category filter by date and category name.
     *
     * @param  array $filters
     * @return Collection|mixed
     */
    public function read(array $filters):Collection
    {
        return DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->whereBetween(
                'products.created_at',
                [$filters['initialDate'],
                    $filters['finalDate']]
            )->select(DB::raw("categories.name as DATA, sum(units) as LABEL"))->groupBy('DATA')->get();
    }
}
