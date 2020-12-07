<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use App\Product;
use App\User;
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

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'expedition_date' => $faker->date(),
        'expiration_date' => $faker->date(),
        'status' => $faker->randomElement(['Paid','Rejected','Pending']),
        'subtotal' => $faker->numberBetween(50,1000),
        'VAT' => 2000,
        'total' => $faker->numberBetween(1000,2000),
        'users_id' => factory(User::class),
    ];
});



