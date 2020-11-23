<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('roles')->insert(
            [
                'name' => 'superadmin',
                'display_name' => 'super administrator',
                'description' => 'wszystkie uprawnienia',
            ]
        );
        DB::table('roles')->insert(
            [
                'name' => 'admin',
                'display_name' => 'administrator',
                'description' => 'dodawanie i edycja wszystkich danych',
            ]
        );
        DB::table('roles')->insert(
            [
                'name' => 'user',
                'display_name' => 'użytkownik sklepu',
                'description' => 'dodawanie i edycja swoich danych',
            ]
        );
    }
}
