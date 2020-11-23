<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class DeliveriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('deliveries')->insert(
            [
                'name' => 'poczta-polska',
                'display_name' => 'Poczta Polska',
                'description' => '',
                'img' => 'pocztapolska.jpg'
            ]
        );
        DB::table('deliveries')->insert(
            [
                'name' => 'in-post',
                'display_name' => 'InPost',
                'description' => 'paczkomt',
                'img' => 'inpost.png'
            ]
        );
    }
}
