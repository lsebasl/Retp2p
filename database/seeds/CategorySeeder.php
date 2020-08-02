<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //cellphones
        factory(Category::class)->create([
            'name' => 'Mobiles',
        ]);

        factory(Category::class)->create([
            'name' => 'Computers',
        ]);

        factory(Category::class)->create([
            'name' => 'Tv & Video',
        ]);

        factory(Category::class)->create([
            'name' => 'Accessories',
        ]);


    }
}
