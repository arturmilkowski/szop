<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /*
        DB::table('types')->insert(
            [
                'product_id' => 1,
                'slug' => '10-ml',
                'name' => '10 ml',
                'price' => 30,
                'quantity' => 25,
                'description' => 'Sed vitae erat tristique, ultrices felis sit amet, blandit lorem. Ut molestie quis purus sed convallis. Pellentesque id facilisis ligula. In imperdiet urna sed neque laoreet, sit amet luctus ex fringilla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras iaculis, dui vel commodo malesuada, urna lectus consequat neque, eget finibus purus nisl sed enim. Sed viverra libero id placerat dictum. Nam a pulvinar augue. Sed lectus nibh, suscipit eget lacus id, viverra bibendum felis. Maecenas dignissim erat eget ultricies vestibulum. Curabitur pellentesque pretium velit, quis auctor nulla.',
                'img' => 'lawenda-dla-panow-10-ml.jpeg'
            ]
        );
        */
        DB::table('types')->insert(
            [
                'product_id' => 1,
                'size_id' => 2,
                'slug' => '15-ml',
                'name' => '15 ml',
                'price' => 40,
                'quantity' => 5,
                'description' => 'szklana butelka z atomizerem zakręcanym na gwint.',
                'img' => 'lawenda-dla-panow-15-ml.webp'
            ]
        );
        DB::table('types')->insert(
            [
                'product_id' => 1,
                'size_id' => 1,
                'slug' => 'probka-4-ml',
                'name' => 'próbka 4 ml',
                'price' => 15,
                'quantity' => 5,
                'description' => 'próbka w szklanej buteleczce z atomizerem. zakręcana na gwint.',
                'img' => 'lawenda-dla-panow-4-ml.webp'
            ]
        );
    }
}
