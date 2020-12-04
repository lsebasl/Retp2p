<?php

namespace App\Metrics;

use App\Invoice;
use Illuminate\Support\Facades\DB;

class SellsByStatus implements MetricsContract
{
    /**
     * @param array $filters
     */
    public function read(array $filters)
    {
        return DB::table('invoices')
            ->whereBetween(
                'invoices.created_at',
                [$filters['initialDate'],
                    $filters['finalDate']]
            )
            ->select(DB::raw("invoices.status as DATA,  count(*) as LABEL"))->groupBy('DATA')->get();
    }
}
