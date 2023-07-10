<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sizes')->insert([
            'name' => 'xs',
            'display_name' => 'Bardzo mały',
            'description' => 'Próbka',
        ]);
        DB::table('sizes')->insert([
            'name' => 's',
            'display_name' => 'Mały',
            'description' => 'Butelka',
        ]);
        DB::table('sizes')->insert([
            'name' => 'm',
            'display_name' => 'Średni',
            'description' => '',
        ]);
    }
}
