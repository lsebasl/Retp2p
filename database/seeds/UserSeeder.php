<?php
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {


        //admin
        User::create([
            'name' => 'Joan Sebastian',
            'last_name' => 'Baron Betancur',
            'id_type' => 'Card ID',
            'identification'=> 1128282172,
            'phone'=> 3172798026,
            'address'=>'Cr 85 # 19 a 48',
            'email' => 'isebasi@hotmail.com',
            'email_verified_at'=> '2020-07-12 18:59:40',
            'role' => USER::ADMIN_ROLE,
            'status' => 'Enable',
            'password' => bcrypt('12345678'),
        ]);

        //User
       User::create([
            'name' => 'Henry',
            'last_name' => 'Baron Rubiano',
            'id_type' => 'Card ID',
            'identification'=> 71584930,
            'phone'=> 3172798026,
            'address'=>'Cr 85 # 19 a 48',
            'email' => 'hbrsystems@hotmail.com',
            'email_verified_at'=> '2020-07-12 18:59:40',
            'role' => USER::ADMIN_ROLE,
            'status' => 'Enable',
            'password' => bcrypt('12345678'),
        ]);

        //Stock Manager
        User::create([
            'name' => 'Claudia',
            'last_name' => 'Betancur',
            'id_type' => 'Card ID',
            'identification'=> 43085267,
            'phone'=> 3172798026,
            'address'=>'Cr 85 # 19 a 48',
            'email' => 'claudiabetancur1000@hotmail.com',
            'email_verified_at'=> '2020-07-12 18:59:40',
            'role' => USER::ADMIN_ROLE,
            'status' => 'Enable',
            'password' => bcrypt('12345678'),
        ]);

        //financeManger
        User::create([
            'name' => 'Daniela',
            'last_name' => 'Baron   ',
            'id_type' => 'Card ID',
            'identification'=> 1012121421,
            'phone'=> 3024458779,
            'address'=>'Cr 85 # 19 a 48',
            'email' => 'nisha101@hotmail.com',
            'email_verified_at'=> '2020-07-12 18:59:40',
            'role' => USER::ADMIN_ROLE,
            'status' => 'Enable',
            'password' => bcrypt('12345678'),
        ]);

        factory(User::class,30)->create();
    }
}
