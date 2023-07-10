<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            // 'user_id' => '6abd1059-b051-4ce1-af5e-799cc38d0ff1',
            'slug' => 'witam-na-mojej-stronie',
            'title' => 'witam na mojej stronie',
            'intro' => 'Intro',
            'content' => 'Content',
            'img' => 'witam-na-mojej-stronie.webp',
            'site_description' => 'Witam na mojej stronie. Zapraszam do zapoznania się z wpisami na blogu i produktami',
            'site_keyword' => 'tworzenie chujowego kodu, chujowy kod',
            'approved' => '1',
            'published' => '1',
            'created_at' => '2022-12-01 22:11:22.000000',
        ]);
    }
}
