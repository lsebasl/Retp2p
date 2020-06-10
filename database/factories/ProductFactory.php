<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'barcode'=>$faker->numberBetween(17700000000000,17799999999999),
        'name' => $faker->company,
        'category'=>$faker->randomElement(['Computers','Tv & Video','Smartphones','Accessories']),
        'model' => $faker->sentence(1),
        'mark' => $faker->sentence(1),
        'description' => $faker->colorName,
        'units' => $faker->numberBetween(0,50),
        'price' => $faker->numberBetween(1000,100000000),
        'discount'=>$faker->numberBetween(10,80),
        'status' => $faker->randomElement(['Enable','Disable']),
    ];
});
