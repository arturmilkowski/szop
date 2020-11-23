<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        $this->call(VoivodeshipsTableSeeder::class);
        // $this->call(ProfilesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ConcentrationsTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(SaleDocumentsTableSeeder::class);
        $this->call(DeliveriesTableSeeder::class);
        $this->call(MethodsTableSeeder::class);
        $this->call(CostsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PostsTagsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        // $this->call(RepliesTableSeeder::class);
    }
}
