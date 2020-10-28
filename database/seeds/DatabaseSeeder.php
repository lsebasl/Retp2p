<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run():void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MarkSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PermissionSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
