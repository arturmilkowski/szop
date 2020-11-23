<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('reviews')->insert(
            [
                'product_id' => 1,
                'rating' => 5.0,
                'content' => 'perfuma fajna',
                'author' => 'Rabarbar',
                'created_at' => now(),
            ]
        );
    }
}
