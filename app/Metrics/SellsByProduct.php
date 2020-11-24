<?php

namespace App\Metrics;

use App\Invoice;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class SellsByProduct implements MetricsContract
{
    /**
     * @param  array $filters
     */
    public function read(array $filters)
    {
        return (DB::table('invoices')
            ->join('invoice_product', 'invoices.id', '=', 'invoice_product.invoice_id')
            ->join('products', 'invoice_product.product_id', '=', 'products.id')
            ->whereBetween(
                'invoices.created_at',
                [$filters['initialDate'],
                    $filters['finalDate']]
            )
            ->where('invoices.status','Paid')
            ->limit(7)
        ->select(DB::raw("concat(products.id, products.name) as DATA,  sum(total_by_product) as LABEL"))
            ->groupBy('DATA')
            ->get());

    }

}
