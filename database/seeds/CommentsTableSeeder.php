<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('comments')->insert(
            [
                'post_id' => 1,
                // 'user_id' => '',
                'content' => 'komentarz do pierwszyego wpisu',
                'author' => 'użytkownik 1',
                'approved' => '0',
                'created_at' => now(),
            ]
        );
    }
}
