<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class CostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // poczta polska, list polecony
        DB::table('costs')->insert(
            [
                'method_id' => 1,
                'piece' => 1,
                'size_id' => 1,  // xs
                'cost' => 5,
                'description' => 'próbka'
            ]
        );
        DB::table('costs')->insert(
            [
                'method_id' => 1,
                'piece' => 1,
                'size_id' => 2,  // s
                'cost' => 15,
                'description' => 'butelka'
            ]
        );
        // poczta polska, paczka
        DB::table('costs')->insert(
            [
                'method_id' => 2,
                'piece' => 1,
                'size_id' => 1,  // xs
                'cost' => 14.00,
                'description' => 'próbka'
            ]
        );
        DB::table('costs')->insert(
            [
                'method_id' => 2,
                'piece' => 1,
                'size_id' => 2,  // s
                'cost' => 14.00,
                'description' => 'butelka'
            ]
        );

        // in post
        DB::table('costs')->insert(
            [
                'method_id' => 3,
                'piece' => 1,
                'size_id' => 1,  // xs
                'cost' => 13.00,
                'description' => 'próbka'
            ]
        );
        DB::table('costs')->insert(
            [
                'method_id' => 3,
                'piece' => 1,
                'size_id' => 2,  // xs
                'cost' => 13.00,
                'description' => 'butelka'
            ]
        );
    }
}
