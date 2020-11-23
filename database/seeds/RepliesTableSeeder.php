<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('replies')->insert(
            [
                'comment_id' => 1,
                'user_id' => '',
                'content' => 'odpowiedź do pierwszego komentarza',
                'name' => 'użytkownik 99',
                'approved' => '1',
                'published' => '1',
            ]
        );
    }
}
