<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_categories = [
          ['category_name' => 'Baby Products', 'category_description' => 'Baby Products description', 'category_slug' => 'baby-products'],
          ['category_name' => 'Beverages', 'category_description' => 'description', 'category_slug' => 'beverages'],
          ['category_name' => 'Cooking Essentials', 'category_description' => 'Cooking Essentials description', 'category_slug' => 'cooking-essentials'],
          ['category_name' => 'Vegetables', 'category_description' => 'Vegetables description', 'category_slug' => 'vegetables'],
          ['category_name' => 'Household', 'category_description' => 'Household description', 'category_slug' => 'household'],
          ['category_name' => 'Bakery', 'category_description' => 'Bakery description', 'category_slug' => 'bakery'],
          ['category_name' => 'Fruits', 'category_description' => 'Fruits description', 'category_slug' => 'fruits'],
          ['category_name' => 'Meats', 'category_description' => 'Meats description', 'category_slug' => 'meats'],
          ['category_name' => 'Seafood', 'category_description' => 'Seafood description', 'category_slug' => 'seafood'],
          ['category_name' => 'Pet Products', 'category_description' => 'Pet Products description', 'category_slug' => 'pe-pProducts']
        ];

        foreach ($product_categories as $category) {
            ProductCategory::create($category);
        }

        $this->command->info("Products Categories created");
    }
}
