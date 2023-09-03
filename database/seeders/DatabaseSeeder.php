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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            BrandSeeder::class,
            CategorySeeder::class,
            ConcentrationSeeder::class,
            ProductSeeder::class,
            SizeSeeder::class,
            TypeSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            ReplySeeder::class,
            VoivodeshipSeeder::class,
            SaleDocumentSeeder::class,
            StatusSeeder::class,
            UserSeeder::class,
            ProfileSeeder::class,
            DeliveryAddressSeeder::class,
            CustomerSeeder::class,
            OrderSeeder::class,
            ItemSeeder::class,
        ]);
    }
}
