<?php

namespace App\Metrics;

use App\Product;
use Illuminate\Support\Facades\DB;

class StockByCategory implements MetricsContract
{
    /**
     * @param array $filters
     */
    public function read(array $filters)
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
