<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'id_type' => $faker->randomElement(['Card ID','Foreign ID','Passport','NIT']),
        'identification'=>$faker->numberBetween(00000, 9999999999),
        'phone'=>$faker->numberBetween(0000000, 999999999999),
        'address'=>$faker->address,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at'=> $faker ->date(),
        'status' => User::ENABLE_STATUS,
        'password' => $faker->password,
    ];
});



