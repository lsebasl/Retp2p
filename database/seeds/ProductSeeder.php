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
            'category' => 'Tv & Video',
            'image' => 'images/buxDsQM6ss4cFlEzQCdokjPa4sD4GSvsLpDRepgj.jpeg',
        ]);
        factory(Product::class,50)->create([
            'category' => 'Computers',
            'image' => 'images/nS5RcjXs7P3VsrsCRiJ09nijy5UrcSiByB36cBzM.jpeg',
        ]);
        factory(Product::class,50)->create([
            'category' => 'Accessories',
            'image' => 'images/TtUKKFg9JsdxKirFCzUvnN4jPnKQ2KtV9woybwHP.jpeg',
        ]);

        factory(Product::class, 50)->create();
    }
}
