<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'name' => 'Jan',
            'lastname' => 'Kowalski',
            'street' => 'Na Wspólnej 1',
            'zip_code' => '00950',
            'city' => 'Warszawa',
            'voivodeship_id' => 7,
            'email' => 'jan.kowalski@gmail.com',
            'phone' => '123456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('customers')->insert([
            'name' => 'Józef',
            'lastname' => 'Nowak',
            'street' => 'Woronicz 17',
            'zip_code' => '00950',
            'city' => 'Warszawa',
            'voivodeship_id' => 7,
            'email' => 'jo.novak@gmail.com',
            'phone' => '123456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
