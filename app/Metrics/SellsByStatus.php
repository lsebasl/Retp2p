<?php

namespace App\Metrics;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SellsByStatus implements MetricsContract
{

    /**
     * Create collection of invoices by status filter by date,invoice status.
     *
     * @param array $filters
     * @return Collection|mixed
     */
    public function read(array $filters):Collection
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
