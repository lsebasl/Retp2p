<?php

namespace Tests\Feature\Roles;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var User
     */
    private $user;
    private $client;
    private $admin;

    public function setUp(): void
    {

        parent::setUp();

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

        $admin = Role::create(['name' => 'Admin','description' => 'Allows the user to have full access to the application.']);
        $client = Role::create(['name' => 'Client','description' => 'User buyer.']);
        $admin->givePermissionTo(
            [
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
            ]
        );

        $this->user = factory(User::class)->create(['role' => 'Admin']);
        $this->user->assignRole('Admin');

    }

    /**
     * @test
     */
    public function admin_can_see_roles_view()
    {
        $response = $this->actingAs($this->user)->get(route('roles.index'));

        $response->assertSee('Roles')
            ->assertSee('List')
            ->assertSee('Admin')
            ->assertStatus(200)
            ->assertViewIs('roles.index')
            ->assertOk();
    }

    /**
     * @test
     */
    public function admin_can_see_roles_create_view()
    {
        $response = $this->actingAs($this->user)->get(route('roles.create'));

        $response->assertSee('Role')
            ->assertSee('Data')
            ->assertSee('roles.index')
            ->assertStatus(200)
            ->assertViewIs('roles.create')
            ->assertOk();
    }

    /**
     * @dataProvider ValidRoleItemsProvider
     * @test
     * @param        $field
     * @param        $value
     */
    public function admin_can_create_roles($field,$value)
    {
        $this->withoutExceptionHandling();

        $filters = [
            $field=> $value
        ];

        $request = [
            'name' => 'Test',
            'description' => 'description test',
            'permissions' => $filters
        ];

        $this->actingAs($this->user)->post(route('roles.store', $request));

        $this->assertDatabaseHas('roles', ['name' => 'Test','description' => 'description test']);
    }

    /**
     * @dataProvider ValidRoleItemsProvider
     * @test
     * @param        $field
     * @param        $value
     */
    public function admin_can_update_roles($field,$value)
    {
        $this->withoutExceptionHandling();

        $filters = [
            $field=> $value
        ];

        $role = factory(Role::class)->create(
            [
                'name' => 'Old Role',
                'description' => 'old description',

            ]
        );

        $request = [
            'name' => 'New Rol',
            'description' => 'New Description',
            'permissions' => $filters
        ];

        $this->actingAs($this->user)->put(route('roles.update', $role), $request);

        $this->assertDatabaseHas('roles', ['name' => 'New Rol','description' => 'New Description']);

    }

    /**
     * @test
     */
    public function admin_can_delete_a_role()
    {
        $role = Role::create(['name' => 'role','description' => 'Allows the user to have full access to the application.']);

        $this->actingAs($this->user)->delete(route('roles.destroy', $role))
            ->assertRedirect(route('roles.index'));

        $this->assertDatabaseMissing('roles', ['name' => $role->name]);

    }

    /**
     * @return array
     */
    public function ValidRoleItemsProvider(): array
    {
        return [
            'Test permission roles.index ' => [0, 1],
            'Test permission roles.create' => [0, 2],
            'Test permission roles.destroy' => [0, 3],
            'Test permission roles.show' => [0, 4],
            'Test permission roles.edit' => [0, 5],
            'Test permission users.index' => [0, 6],
            'Test permission users.destroy' => [0, 7],
        ];

    }

    /**
     * @return array
     */
    public function notValidRoleItemsProvider(): array
    {
        return [
            'Test name is too long' => ['name', Str::random(52)],
            'Test name is too short' => ['name', Str::random(1)],
            'Test name is required' => ['name',null],
            'Test name is string' => ['name',[2]],
            'Test description is string' => ['name',[2]],
            'Test description is too long' => ['description', Str::random(52)],
            'Test description is required' => ['description',null],
            'Test name is too description' => ['description', Str::random(1)],
        ];
    }

}
