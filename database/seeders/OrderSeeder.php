<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            'id' => 1,
            'orderable_id' => 1,
            'orderable_type' => 'App\Models\Customer\Customer',
            'status_id' => 1,
            'sale_document_id' => 1,
            'total_price' => 100,
            'delivery_cost' => 15,
            'total_price_and_delivery_cost' => 115,
            'delivery_name' => 'Poczta Polska',
            'comment' => 'Komentarz do zamówienia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('orders')->insert([
            'id' => 2,
            'orderable_id' => 2,
            'orderable_type' => 'App\Models\Customer\Customer',
            'status_id' => 1,
            'sale_document_id' => 1,
            'total_price' => 200,
            'delivery_cost' => 15,
            'total_price_and_delivery_cost' => 215,
            'delivery_name' => 'Poczta Polska',
            // 'comment' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
