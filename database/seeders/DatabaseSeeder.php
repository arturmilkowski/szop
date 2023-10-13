<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            VoivodeshipSeeder::class,
            ProfileSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ConcentrationSeeder::class,
            ProductSeeder::class,
            SizeSeeder::class,
            TypeSeeder::class,
            PostSeeder::class,
            TagSeeder::class,
            CommentSeeder::class,
            ReplySeeder::class,
            SaleDocumentSeeder::class,
            StatusSeeder::class,
            DeliveryAddressSeeder::class,
            CustomerSeeder::class,
            OrderSeeder::class,
            ItemSeeder::class,
        ]);
    }
}
