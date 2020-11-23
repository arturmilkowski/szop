<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('brands')->insert(
            ['slug' => 'wokol-lawendy', 'name' => 'wokół lawendy']
        );
    }
}