<?php

namespace App\Metrics;

use App\Invoice;
use App\Product;
use App\User;
use Illuminate\Support\Facades\DB;

class TopClients implements MetricsContract
{
    /**
     * @param  array $filters
     */
    public function read(array $filters)
    {
        return DB::table('invoices')
            ->join('users', 'invoices.users_id', '=', 'users.id')
            ->whereBetween(
                'users.created_at',
                [$filters['initialDate'],
                    $filters['finalDate']]
            )->limit(7)
            ->select(DB::raw('UCASE(concat(users.name," ",users.last_name)) AS DATA,
SUM(invoices.total) AS LABEL'))->groupBy('DATA')
        ->orderBy('DATA')
        ->get();

    }

}
