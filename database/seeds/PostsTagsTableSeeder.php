<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class PostsTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('post_tag')->insert(
            [
                'post_id' => 1,
                'tag_id' => 1,
            ]
        );
        DB::table('post_tag')->insert(
            [
                'post_id' => 2,
                'tag_id' => 1,
            ]
        );
        DB::table('post_tag')->insert(
            [
                'post_id' => 3,
                'tag_id' => 2,
            ]
        );
    }
}
