<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class MethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('methods')->insert(
            [
                'delivery_id' => 1,
                'name' => 'list-polecony',
                'display_name' => 'list polecony',
                'description' => ''
            ]
        );
        DB::table('methods')->insert(
            [
                'delivery_id' => 1,
                'name' => 'paczka',
                'display_name' => 'paczka',
                'description' => ''
            ]
        );
        DB::table('methods')->insert(
            [
                'delivery_id' => 2,
                'name' => 'paczkomat',
                'display_name' => 'paczkomat',
                'description' => ''
            ]
        );
    }
}
