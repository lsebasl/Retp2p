<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        factory(Product::class,50)->create([
            'category_id' => 1,
            'image' => 'images/VfXxmkvJYvtlyYMEfLwPjGC5dueEYM1CLlYGKEoG.jpeg',
        ]);
        factory(Product::class,50)->create([
            'category_id' => 2,
            'image' => 'images/0gvEYujTKeRDEnltHEgVbN7ISptzTenVOj1RdiQF.jpeg',
        ]);
        factory(Product::class,50)->create([
            'category_id' => 3,
            'image' => 'images/75a6kBzZe0EiNbEPQQigOn7PaTz1eClJGEDI109P.jpeg',
        ]);
        factory(Product::class,50)->create([
            'category_id' => 4,
            'image' => 'images/4ktCEMSoiveO1HqWguluHe92bARYculdU0pkLYYR.jpeg',
        ]);
    }
}
