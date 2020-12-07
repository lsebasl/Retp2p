<?php

return [
        'sellByCategory' =>
            ['class'=>\App\Metrics\SellsByCategory::class,
                'tittle'=>'Sells By Category',
                'ejeX' => 'Category',
                'ejeY' => 'Sells'
            ],

        'sellByStatus' =>
            ['class'=>\App\Metrics\SellsByStatus::class,
                'tittle'=>'Sells By Status',
                'ejeX' => 'Status',
                'ejeY' => 'Sells'

            ],

        'sellByProduct' =>
            ['class'=>\App\Metrics\SellsByProduct::class,
                'tittle'=>'Sells By Product',
                'ejeX' => 'Product',
                'ejeY' => 'Sells'],

        'stockByCategory' =>
            ['class'=>\App\Metrics\StockByCategory::class,
             'tittle'=>'Stock By Category',
            'ejeX' => 'Category',
                'ejeY' => 'Stock'],

        'usersStatus' =>
            ['class'=> \App\Metrics\UsersStatus::class,
            'tittle'=>'User Status',
                 'ejeX' => 'Status',
                'ejeY' => 'Users'],

        'topClient' =>
            ['class'=> \App\Metrics\TopClients::class,
                'tittle'=>'Best Buyers',
                    'ejeX' => 'Clients',
                    'ejeY' => 'Buys'
            ],

];
