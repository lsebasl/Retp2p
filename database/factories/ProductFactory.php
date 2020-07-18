<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'barcode'=>$faker->numberBetween(17700000000000,17799999999999),
        'name' => $faker->sentence(1),
        'category'=>$faker->randomElement(['Computers','Tv & Video','Mobiles','Accessories']),
        'model' => $faker->sentence(1),
        'mark' => $faker->randomElement(['Huawei','Samsung','Xiaomi','Lg','Microsoft','HTC','Motorola','Blur','Apple',
            'BlackBerry','Lenovo','Alcatel','Sony Ericsson','Nokia','Vodafone','Hp','Dell','Cannon','Msi','Gigabyte','BenQ']),
        'description' => $faker->colorName,
        'units' => $faker->numberBetween(0,50),
        'price' => $faker->numberBetween(1000,100000000),
        'discount'=>$faker->numberBetween(10,80),
        'status' => $faker->randomElement(['Enable','Disable']),
        'image' => $faker->randomElement(['images/k6NSrGJpLdl0pJYZAy1pdZPMx8JpLYeLOiyBQvx8.jpeg','images/aoNp39eX63kT04fmghxIoPhy3SsjtcXzqE2RVj9J.jpeg','images/TTmozEB8fYvuyko44QXHgMRW3vnFm7xfwCskKgLK.jpeg']),
    ];
});
