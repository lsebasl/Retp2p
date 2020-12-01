<?php

namespace App\Metrics;

use Illuminate\Database\Eloquent\Collection;

interface MetricsContract
{
    /**
     * @param  array $filters
     * @return mixed
     */
    public function read(array $filters);
}
