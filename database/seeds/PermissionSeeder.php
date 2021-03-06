<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'roles.index', 'description' => 'Access to see roles lists']);
        Permission::create(['name' => 'roles.create', 'description' => 'Access to form create roles']);
        Permission::create(['name' => 'roles.destroy','description' => 'Access to delete roles']);
        Permission::create(['name' => 'roles.show','description' => 'Access to see a specific roles']);
        Permission::create(['name' => 'roles.edit','description' => 'Access to edit roles']);


        Permission::create(['name' => 'users.index', 'description' => 'Access to see users list']);
        Permission::create(['name' => 'users.destroy','description' => 'Access to see delete users']);
        Permission::create(['name' => 'users.show','description' => 'Access to see a specific user']);
        Permission::create(['name' => 'users.edit','description' =>'Access to edit users']);

        Permission::create(['name' => 'products.index', 'description' => 'Access to see products lists']);
        Permission::create(['name' => 'products.create', 'description' => 'Access to create products']);
        Permission::create(['name' => 'products.destroy','description' => 'Access to delete products']);
        Permission::create(['name' => 'products.show','description' => 'Access to see a specific product']);
        Permission::create(['name' => 'products.edit','description' => 'Access to edit products']);

        Permission::create(['name' => 'clients.index','description' => 'Access to see products clients']);
        Permission::create(['name' => 'clients.create','description' => 'Access to create clients']);
        Permission::create(['name' => 'clients.destroy','description' => 'Access to delete clients']);
        Permission::create(['name' => 'clients.show','description' => 'Access to see a specific client']);
        Permission::create(['name' => 'clients.edit','description' => 'Access to edit a clients']);

        Permission::create(['name' => 'invoices.index','description' => 'Access to see invoices']);
        Permission::create(['name' => 'invoices.create','description' => 'Access to create invoices']);
        Permission::create(['name' => 'invoices.destroy','description' => 'Access to eliminate invoices']);
        Permission::create(['name' => 'invoices.show','description' => 'Access to see a specific invoices']);
        Permission::create(['name' => 'invoices.edit','description' => 'Access to edit invoices']);

        Permission::create(['name' => 'stocks.index','description' => 'Access to see inventory']);

        Permission::create(['name' => 'home','description' => 'Access to administrative interface']);

        Permission::create(['name' => 'export','description' => 'Access to export excel products']);
        Permission::create(['name' => 'import','description' => 'Access to import excel products']);

        Permission::create(['name' => 'payment.attempt','description' => 'Access to pay products']);
        Permission::create(['name' => 'payment.history','description' => 'Access to see payment attempts']);
        Permission::create(['name' => 'payment.callback','description' => 'Access to pay products']);

        Permission::create(['name' => 'store.profile','description' => 'Access to see profile']);
        Permission::create(['name' => 'cart.add','description' => 'Access to add to shopping cart']);
        Permission::create(['name' => 'cart.show','description' => 'Access to see to shopping cart']);
        Permission::create(['name' => 'cart.update','description' => 'Access to update shopping cart']);
        Permission::create(['name' => 'cart.destroy','description' => 'Access to delete shopping cart']);

        Permission::create(['name' => 'report.index','description' => 'Access see report systems view']);
        Permission::create(['name' => 'report.show','description' => 'Access to create systems reports']);
        Permission::create(['name' => 'users.export','description' => 'Access to export users systems reports']);
        Permission::create(['name' => 'products.export','description' => 'Access to export products systems reports']);
        Permission::create(['name' => 'sells.export','description' => 'Access to export sells systems reports']);

        Role::truncate();

        $admin = Role::create(['name' => 'Admin','description' => 'Allows the user to have full access to the application.']);

        $admin->givePermissionTo([
            'report.index',
            'report.show',
            'users.export',
            'products.export',
            'sells.export',
            'users.index',
            'users.destroy',
            'users.show',
            'users.edit',
            'products.index',
            'products.create',
            'products.destroy',
            'products.show',
            'products.edit',
            'roles.index',
            'roles.create',
            'roles.destroy',
            'roles.show',
            'roles.edit',
            'clients.index',
            'clients.create',
            'clients.destroy',
            'clients.show',
            'clients.edit',
            'invoices.index',
            'invoices.create',
            'invoices.destroy',
            'invoices.show',
            'invoices.edit',
            'stocks.index',
            'home',
            'export',
            'import',
            'payment.attempt',
            'payment.history',
            'payment.callback',
            'store.profile',
            'cart.add',
            'cart.show',
            'cart.update',
            'cart.destroy',
        ]);

        $client = Role::create(['name' => 'Client','description' => 'Allows the user buy, see his profile and transactions.']);

        $client->givePermissionTo([
            'payment.attempt',
            'payment.history',
            'payment.callback',
            'store.profile',
            'cart.add',
            'cart.show',
            'cart.update',
            'cart.destroy',
            'invoices.index',
            'invoices.create',
            'invoices.show',
            'invoices.edit',
            'invoices.destroy',

        ]);

        $stock = Role::create(['name' => 'StockManager','description' => 'Allows the user access manage products.']);

        $stock->givePermissionTo([
            'products.index',
            'products.create',
            'products.destroy',
            'products.show',
            'products.edit',
            'stocks.index',
            'home',
            'export',
            'import',

        ]);

        $sells = Role::create(['name' => 'SellsManager','description' => 'Allows the user access see products and sells.']);

        $sells->givePermissionTo([
            'products.index',
            'stocks.index',
            'home',
            'clients.index',
            'clients.create',
            'clients.destroy',
            'clients.show',
            'clients.edit',

        ]);

        //assign Admin Role to user 1
        $adminUser = User::find(1);
        $adminUser->assignRole('Admin');

        //assign Client Role to user 2
        $clientUser = User::find(2);
        $clientUser->assignRole('Client');

        //assign Stock Role to user 3
        $stockUser = User::find(3);
        $stockUser->assignRole('StockManager');

        //assign Sells Role to user 4
        $sellsUser = User::find(4);
        $sellsUser->assignRole('SellsManager');

        //assign Sells Role to user 5
        $Clients = User::find(5);
        $Clients->assignRole('Client');

        //assign Sells Role to user 6
        $Clients = User::find(6);
        $Clients->assignRole('Client');

        //assign Sells Role to user 7
        $Clients = User::find(7);
        $Clients->assignRole('Client');

        //assign Sells Role to user 8
        $Clients = User::find(8);
        $Clients->assignRole('Client');

        //assign Sells Role to user 9
        $Clients = User::find(9);
        $Clients->assignRole('Client');

        //assign Sells Role to user 10
        $Clients = User::find(10);
        $Clients->assignRole('Client');

        //assign Sells Role to user 11
        $Clients = User::find(11);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(12);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(13);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(14);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(15);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(16);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(17);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(18);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(19);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(20);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(21);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(22);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(23);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(24);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(25);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(26);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(27);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(28);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(29);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(30);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(31);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(32);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(33);
        $Clients->assignRole('Client');

        //assign Sells Role to user 12
        $Clients = User::find(34);
        $Clients->assignRole('Client');

    }
}
