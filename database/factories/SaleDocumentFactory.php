<?php

declare(strict_types = 1);

use App\Models\SaleDocument;

$factory->define(
    SaleDocument::class,
    function () {
        return [            
            'name' => 'none',
            'display_name' => 'brak',
            'description' => 'nie chcę rachunku ani faktury',
        ];
    }
);
