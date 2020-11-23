<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('tags')->insert(
            [
                'slug' => 'woda-kolonska',
                'name' => 'woda kolońska',
            ]
        );
        DB::table('tags')->insert(
            [
                'slug' => 'recenzja',
                'name' => 'recenzja',
            ]
        );
    }
}
