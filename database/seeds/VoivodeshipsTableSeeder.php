<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class VoivodeshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('voivodeships')->insert(['name' => 'dolnośląskie']);
        DB::table('voivodeships')->insert(['name' => 'kujawsko-pomorskie']);
        DB::table('voivodeships')->insert(['name' => 'lubelskie']);
        DB::table('voivodeships')->insert(['name' => 'lubuskie']);
        DB::table('voivodeships')->insert(['name' => 'łódzkie']);
        DB::table('voivodeships')->insert(['name' => 'małopolskie']);
        DB::table('voivodeships')->insert(['name' => 'mazowieckie']);
        DB::table('voivodeships')->insert(['name' => 'opolskie']);
        DB::table('voivodeships')->insert(['name' => 'podkarpackie']);
        DB::table('voivodeships')->insert(['name' => 'podlaskie']);
        DB::table('voivodeships')->insert(['name' => 'pomorskie']);
        DB::table('voivodeships')->insert(['name' => 'śląskie']);
        DB::table('voivodeships')->insert(['name' => 'świętokrzyskie']);
        DB::table('voivodeships')->insert(['name' => 'warmińsko-mazurskie']);
        DB::table('voivodeships')->insert(['name' => 'wielkopolskie']);
        DB::table('voivodeships')->insert(['name' => 'zachodniopomorskie']);
    }
}
