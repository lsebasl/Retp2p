<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run():void
    {
        $this->call(UserSeeder::class);
        $this->call(MarkSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);

    }
}
