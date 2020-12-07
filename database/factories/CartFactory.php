<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cart;
use App\Product;
use Faker\Generator as Faker;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'quantity' => $faker->numberBetween(1-10),
        'product_id' => \factory(Product::class),
        'price' => $faker->numberBetween(1000-20000),
        'user_id' => $faker->numberBetween(1),
        'subtotal' => $faker->numberBetween(1000-20000)
    ];
});



