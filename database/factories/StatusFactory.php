<?php

declare(strict_types = 1);

use App\Models\Status;

$factory->define(
    Status::class,
    function () {
        return [            
            'name' => 'placed',
            'display_name' => 'złożone',
            'description' => 'zamówienie wysłane do sklepu',
        ];
    }
);
