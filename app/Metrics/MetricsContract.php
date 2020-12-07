<?php

namespace App\Metrics;

use Illuminate\Support\Collection;

interface MetricsContract
{

    /**
     * Interface to implement method read in metrics manager.
     *
     * @param  array $filters
     * @return Collection
     */
    public function read(array $filters):Collection;
}
