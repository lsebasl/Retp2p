<?php

namespace App\Metrics;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class MetricsManager
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
     * @param  array $filters
     * @return Model|mixed
     */
    public function read(array $filters)
    {
        return $this->behaviour->read($filters);
    }
}
