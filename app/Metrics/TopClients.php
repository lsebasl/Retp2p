<?php

namespace App\Metrics;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TopClients implements MetricsContract
{
    /**
     * Create collection the best 7 client in the store, filter by date.
     *
     * @param array $filters
     * @return Collection|mixed
     */
    public function read(array $filters):Collection
    {
        return DB::table('invoices')
            ->join('users', 'invoices.users_id', '=', 'users.id')
            ->whereBetween(
                'users.created_at',
                [$filters['initialDate'],
                    $filters['finalDate']]
            )->limit(7)
            ->select(
                DB::raw(
                    'UCASE(concat(users.name," ",users.last_name)) AS DATA,
                SUM(invoices.total) AS LABEL'
                )
            )->groupBy('DATA')
            ->orderBy('DATA')
            ->get();
    }
}
