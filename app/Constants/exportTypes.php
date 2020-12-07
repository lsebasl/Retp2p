<?php

namespace App\Constants;

use MyCLabs\Enum\Enum;

class exportTypes extends Enum
{
    public const Users = 'exportUsers';
    public const Products = 'exportProducts';
    public const Sells = 'exportSells';
    public const Custom = 'exportAccessories';
}
