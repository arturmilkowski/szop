<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
                'id' => 1,
                'slug' => 'damska',
                'name' => 'damska'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => 2,
                'slug' => 'meska',
                'name' => 'męska'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => 3,
                'slug' => 'damsko-meska',
                'name' => 'damsko męska'
            ]
        );
    }
}
