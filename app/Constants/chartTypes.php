<?php

namespace App\Constants;

use MyCLabs\Enum\Enum;

class chartTypes extends Enum
{
    public const HORIZONTAL_BAR = 'horizontalBar';
    public const PIE = 'pie';
    public const POLAR_AREA = 'polarArea';
    public const DOUGHNUT = 'doughnut';
    public const LINE = 'line';
    public const BAR = 'bar';
}
