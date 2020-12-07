<?php

namespace App\Metrics;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SellsByCategory implements MetricsContract
{

    /**
     * Create collection of sells by category filter by date,category and status.
     *
     * @param  array $filters
     * @return Collection
     */
    public function read(array $filters):Collection
    {
        return DB::table('invoices')
            ->join('invoice_product', 'invoices.id', '=', 'invoice_product.invoice_id')
            ->join('products', 'invoice_product.product_id', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->whereBetween(
                'invoices.created_at',
                [$filters['initialDate'],
                $filters['finalDate']]
            )
            ->where('invoices.status', 'Paid')
            ->select(DB::raw("categories.name as DATA,  sum(total_by_product) as LABEL"))->groupBy('category_id')->get();
    }
}
