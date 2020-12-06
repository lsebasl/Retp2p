<?php

namespace App\Metrics;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SellsByProduct implements MetricsContract
{

    /**
     * Create collection of invoices by product filter by date,invoice status.
     *
     * @param  array $filters
     * @return Collection
     */
    public function read(array $filters):Collection
    {
        return (DB::table('invoices')
            ->join('invoice_product', 'invoices.id', '=', 'invoice_product.invoice_id')
            ->join('products', 'invoice_product.product_id', '=', 'products.id')
            ->whereBetween(
                'invoices.created_at',
                [$filters['initialDate'],
                    $filters['finalDate']]
            )
            ->where('invoices.status', 'Paid')
            ->limit(7)
            ->select(DB::raw("concat(products.id, products.name) as DATA,  sum(total_by_product) as LABEL"))
            ->groupBy('DATA')
            ->get());
    }
}
