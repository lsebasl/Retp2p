<?php

namespace App\Metrics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class MetricsManager implements MetricsContract
{
    /**
     * @var MetricContract
     */
    private $behaviour;

    /**
     * Metric constructor.
     *
     * @param MetricsContract $behaviour
     */
    public function __construct(MetricsContract $behaviour)
    {
        $this->behaviour = $behaviour;
    }


    /**
     * Read the a behavior depending of a specific collection.
     *
     * @param  array $filters
     * @return Collection
     */
    public function read(array $filters):Collection
    {
        return $this->behaviour->read($filters);
    }
}
