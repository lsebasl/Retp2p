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
            'image' => 'images/hOh8cxP8G80mcO9aohbgrHAi5Rf4p4RdKFh1bAzj.jpeg',
        ]);
        factory(Product::class,50)->create([
            'category_id' => 2,
            'image' => 'images/9WPLXBPKQgg1OStJ5a4uAX73XdrgMBvvSeOSzgvP.jpeg',
        ]);
        factory(Product::class,50)->create([
            'category_id' => 3,
            'image' => 'images/hOh8cxP8G80mcO9aohbgrHAi5Rf4p4RdKFh1bAzj.jpeg',
        ]);
        factory(Product::class,50)->create([
            'category_id' => 4,
            'image' => 'images/hOh8cxP8G80mcO9aohbgrHAi5Rf4p4RdKFh1bAzj.jpeg',
        ]);
    }
}
