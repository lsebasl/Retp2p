<?php

namespace App\Constants;

use MyCLabs\Enum\Enum;

class reportTypes extends Enum
{
    public const USER_STATUS = 'usersStatus';
    public const SELLS_BY_STATUS = 'sellByStatus';
    public const SELLS_BY_CATEGORY = 'sellByCategory';
    public const SELLS_BY_PRODUCTS = 'sellByProduct';
    public const TOP_CLIENTS = 'topClient';
    public const STOCK_BY_CATEGORY = 'stockByCategory';

}
