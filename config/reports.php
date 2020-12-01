<?php

return [
        'exportUsers' => [
            'behaviour' =>  \App\Reports\ReportUsers::class,
            'table' => 'users'
            ],
        'exportProducts' => [
            'behaviour' => \App\Reports\ReportProducts::class,
            'table' => 'products',
        ],
        'exportSells' =>[
            'behaviour' => \App\Reports\ReportSells::class,
            'table' => 'invoices'
        ]

];
