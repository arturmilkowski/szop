<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('sizes')->insert(
            [
                'name' => 'xs',
                'display_name' => 'bardzo mały',
                'description' => 'próbka',
            ]
        );
        DB::table('sizes')->insert(
            [
                'name' => 's',
                'display_name' => 'mały',
                'description' => 'butelka',
            ]
        );
        DB::table('sizes')->insert(
            [
                'name' => 'm',
                'display_name' => 'średni',
                'description' => '',
            ]
        );
        DB::table('sizes')->insert(
            [
                'name' => 'l',
                'display_name' => 'duży',
                'description' => '',
            ]
        );
        DB::table('sizes')->insert(
            [
                'name' => 'xl',
                'display_name' => 'bardzo duży',
                'description' => '',
            ]
        );
        DB::table('sizes')->insert(
            [
                'name' => 'xxl',
                'display_name' => 'ogromny',
                'description' => '',
            ]
        );
    }
}
