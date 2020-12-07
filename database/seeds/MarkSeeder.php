<?php

use Illuminate\Database\Seeder;
use App\Mark;


class MarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        //cellphones
        factory(Mark::class)->create([
            'name' => 'Huawei',
        ]);

        factory(Mark::class)->create([
            'name' => 'Samsung',
        ]);

        factory(Mark::class)->create([
            'name' => 'Xiaomi',
        ]);

        factory(Mark::class)->create([
            'name' => 'Lg',
        ]);

        factory(Mark::class)->create([
            'name' => 'Microsoft',
        ]);

        factory(Mark::class)->create([
            'name' => 'HTC',
        ]);

        factory(Mark::class)->create([
            'name' => 'Motorola',
        ]);

        factory(Mark::class)->create([
            'name' => 'Blur',
        ]);

        factory(Mark::class)->create([
            'name' => 'Apple',
        ]);

        factory(Mark::class)->create([
            'name' => 'BlackBerry',
        ]);

        factory(Mark::class)->create([
            'name' => 'Lenovo',
        ]);

        factory(Mark::class)->create([
            'name' => 'Alcatel',
        ]);

        factory(Mark::class)->create([
            'name' => 'Sony',
        ]);

        factory(Mark::class)->create([
            'name' => 'Nokia',
        ]);

        factory(Mark::class)->create([
            'name' => 'Vodafone',
        ]);

        //computers

        factory(Mark::class)->create([
            'name' => 'Hp',
        ]);

        factory(Mark::class)->create([
            'name' => 'Dell',
        ]);

        factory(Mark::class)->create([
            'name' => 'Cannon',
        ]);

        //Tv & Video

        factory(Mark::class)->create([
            'name' => 'Msi',
        ]);

        factory(Mark::class)->create([
            'name' => 'Gigabyte',
        ]);

        factory(Mark::class)->create([
            'name' => 'BenQ',
        ]);

    }
}
