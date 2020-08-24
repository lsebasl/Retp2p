<?php

/** @var Factory $factory */

use App\Category;
use App\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'barcode'=>$faker->numberBetween(17700000000000,17799999999999),
        'name' => $faker->randomElement(['Galaxy','Redmi','IPhone','Moto G','Power']),
        'category_id'=> \factory(Category::class),
        'model' => $faker->sentence(1),
        'mark' => $faker->randomElement(['Huawei','Samsung','Xiaomi','Lg','Microsoft','Motorola','Blur','Apple',
            'Hp','Dell','Cannon','Msi','Gigabyte','BenQ']),
        'description' => $faker->colorName,
        'units' => $faker->numberBetween(0,50),
        'price' => $faker->numberBetween(50,30000),
        'discount'=>$faker->randomElement([0.1,0.8,0.5,0.2,0.6,0.3]),
        'status' => $faker->randomElement(['Enable']),
        'image' => $faker->randomElement(['images/onKLwFSp6cOFtrhmYgXJCNI3rBHTJUPUeJOX3mpD.jpeg','images/r93w5odmMDTHo1jX8ID4JManAlWbk0AvcippV08J.jpeg','images/RGKdF9YFJLwxXy6n9qesRKmhGCGzqFJImyfYjlru.jpeg']),
    ];
});
