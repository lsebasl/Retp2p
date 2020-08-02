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
            'image' => 'images/xwOr8OuQj4ghB6bcIMe13StdfTxhFyCllMqqnNdK.jpeg',
        ]);
        factory(Product::class,50)->create([
            'category_id' => 2,
            'image' => 'images/hevM5gobDtC3exIikBHYiOHwo7Pe9JGfpS0W7l4O.jpeg',
        ]);
        factory(Product::class,50)->create([
            'category_id' => 3,
            'image' => 'images/buxDsQM6ss4cFlEzQCdokjPa4sD4GSvsLpDRepgj.jpeg',
        ]);
        factory(Product::class,50)->create([
            'category_id' => 4,
            'image' => 'images/ugEE5BRFvbeu8QEkjIjE4GN1VJritD0BOomZs4S0.jpeg',
        ]);
    }
}
