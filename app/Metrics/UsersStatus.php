<?php

namespace App\Metrics;

use App\Invoice;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersStatus implements MetricsContract
{
    /**
     * @param  array $filters
     */
    public function read(array $filters)
    {
        return DB::table('users')
            ->whereBetween(
                'users.created_at',
                [$filters['initialDate'],
                    $filters['finalDate']]
            )
            ->select(DB::raw("users.status as DATA,  count(*) as LABEL"))->groupBy('DATA')->get();
    }

}
