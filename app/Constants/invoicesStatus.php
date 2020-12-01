<?php

namespace App\Constants;

use MyCLabs\Enum\Enum;

class invoicesStatus extends Enum
{
    public const Paid = 'Paid';
    public const Pending = 'Pending';
    public const Rejected = 'Rejected';

}
