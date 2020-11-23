<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class SaleDocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('sale_documents')->insert(
            [
                'name' => 'none',
                'display_name' => 'brak',
                'description' => 'nie chcę rachunku ani faktury'
            ]
        );
        DB::table('sale_documents')->insert(
            [
                'name' => 'bill',
                'display_name' => 'rachunek',
                'description' => 'rachunek'
            ]
        );
        DB::table('sale_documents')->insert(
            [
                'name' => 'invoice',
                'display_name' => 'faktura',
                'description' => 'faktura'
            ]
        );
    }
}
