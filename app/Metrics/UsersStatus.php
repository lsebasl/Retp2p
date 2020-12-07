<?php

namespace App\Metrics;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UsersStatus implements MetricsContract
{
    /**
     * Create collection of user by filter by date and status.
     *
     * @param  array $filters
     * @return Collection|mixed
     */
    public function read(array $filters):Collection
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
