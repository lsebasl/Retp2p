<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use App\PaymentAttempt;
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

$factory->define(PaymentAttempt::class, function (Faker $faker) {
    return [
        'requestId' => 414480,
        'processUrl' => 'https://test.placetopay.com/redirection/session/414480/42222cbcd0b7612021f695073e2d6821',
        'status' => 'APPROVED',
        'invoice_id' => factory(Invoice::class),
    ];
});



