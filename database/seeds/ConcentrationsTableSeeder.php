<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class ConcentrationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('concentrations')->insert(
            [
                'id' => 1,
                'slug' => 'woda-kolonska',
                'name' => 'woda kolońska'
            ]
        );
    }
}
