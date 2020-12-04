<?php

namespace App\Metrics;

use App\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SellsByCategory implements MetricsContract
{
    /**
     * @param array $filters
     * @return \Illuminate\Support\Collection
     */
    public function read(array $filters)
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
