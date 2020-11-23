<?php

declare(strict_types = 1);

use App\Models\Role;
// use Faker\Generator as Faker;

$factory->define(
    Role::class,
    function (/*Faker $faker*/) {
        return [
            'id' => 3,
            'name' => 'user',
            'display_name' => 'użytkownik',
            'description' => 'użytkownik sklepu',
        ];
    }
);

$factory->state(
    Role::class, 'superadmin', [
        'id' => 1,
        'name' => 'superadmin',
        'display_name' => 'super administrator',
        'description' => 'wszystkie uprawnienia',
    ]
);

$factory->state(
    Role::class, 'admin', [
        'id' => 2,
        'name' => 'admin',
        'display_name' => 'administrator',
        'description' => 'dodawanie i edycja wszystkich danych',
    ]
);