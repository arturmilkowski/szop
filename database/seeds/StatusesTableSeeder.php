<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('statuses')->insert(
            [
                'name' => 'placed',
                'display_name' => 'złożone',
                'description' => 'zamówienie wysłane do sklepu'
            ]
        );
        DB::table('statuses')->insert(
            [
                'name' => 'paid',
                'display_name' => 'opłacone',
                'description' => 'zamówienie zostało opłacone'
            ]
        );
        DB::table('statuses')->insert(
            [
                'name' => 'in_progress',
                'display_name' => 'w trakcie realizacji',
                'description' => 'zamówienie jest w trakcie realizacji'
            ]
        );
        DB::table('statuses')->insert(
            [
                'name' => 'shipped',
                'display_name' => 'wysłane',
                'description' => 'zamówienie zostało wysłane'
            ]
        );
        DB::table('statuses')->insert(
            [
                'name' => 'completed',
                'display_name' => 'zrealizowane',
                'description' => 'zamówienie zostało zrealizowane'
            ]
        );
        DB::table('statuses')->insert(
            [
                'name' => 'canceled',
                'display_name' => 'anulowane',
                'description' => 'zamówienie zostało anulowane'
            ]
        );
    }
}
