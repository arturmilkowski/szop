<?php

return [
    'currency' => 'zł',
    'delivery' => [
        'polish_post_office' => [
            'name' => 'Poczta Polska',
            'methods' => [
                'registered_letter' => 'List polecony',
                'parcel' => 'Paczka',
            ],
            'cost' => [
                '1' => 15,
                '2' => 15,
                '3' => 15,
                '4' => 15,
                '5' => 20,
                'more' => 45
            ],
        ],
        'methods_of_payment' => ['prepayment' => 'Przedpłata na konto']
    ],
];
