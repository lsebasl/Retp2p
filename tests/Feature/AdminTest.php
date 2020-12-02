<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Filesystem\Cache;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var User
     */
    private $user;

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

        $admin = Role::create(['name' => 'Admin','description' => 'Allows the user to have full access to the application.']);
        $client = Role::create(['name' => 'Client','description' => 'User buyer.']);
        $admin->givePermissionTo([
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

        $this->user = factory(User::class)->create(['role' => 'Admin']);
        $this->user->assignRole('Admin');

    }

    /**
     * @test
     */
    public function NoAuthenticatedUserCantAccessToUsersIndex()
    {
        $response = $this->get(route('users.index'));
        $response->assertRedirect(route('login'));

    }
    /**
     * @test
     */
    public function NoAuthenticatedUserCantAccessToUsersShow()
    {
        $user=factory(User::class)->create();

        $this->get(route('users.show', $user))
            ->assertRedirect(route('login'));

    }
    /**
     * @test
     */
    public function NoAuthenticatedUserCantAccessToUsersEdit()
    {
        $user=factory(User::class)->create();

        $this->get(route('users.edit', $user))
            ->assertRedirect(route('login'));

    }
    /**
     * @test
     */
    public function NoAuthenticatedUserCantAccessToUsersUpdate()
    {
        $user=factory(User::class)->create();

        $this->put(route('users.update', $user))
            ->assertRedirect(route('login'));

    }
    /**
     * @test
     */
    public function NoAuthenticatedUserCantAccessToUsersDelete()
    {
        $user=factory(User::class)->create();

        $this->delete(route('users.destroy', $user))
            ->assertRedirect(route('login'));

    }
    /**
     * @test
     */
    public function NoAuthenticatedUserCanSeeLogin()
    {

        $this->get(route('login'))
            ->assertSee('Sign in with your Account')
            ->assertSee('Password');

    }
    /**
     * @test
     */
    public function NoAuthenticatedUserCanSeeWelcome()
    {

        $this->get('/')
            ->assertSee('Project Store');

    }
    /**
     * @test
     */
    public function NoAuthenticatedUserCantUpdateAClient()
    {
        $user = factory(User::class)->create();

        $this->put(
            route('users.update', $user), [

                'name' => 'Test Name',
                'last_name' => 'Test Last Name',
                'id_type' => 'NIT',
                'identification' => 'Test User last Name',
                'phone' => '3172798026',
                'address' => 'Test User address',
                'email' => 'test@gmail.com',

            ]
        )
            ->assertRedirect(route('login'));

        $this->assertDatabaseMissing('users', ['id'=>$user->name]);


    }
    /**
     * @test
     */

    public function NoAuthenticatedUserCantsDeleteAUser()
    {
        $user = factory(User::class)->create();

        $this->delete(route('users.destroy', $user))
            ->assertRedirect(route('login'));

        $this->assertDatabasehas('users', ['id'=>$user->id]);
    }

    /**
     * @test
     */
    public function admin_can_see_home_view()
    {
        $response = $this->actingAs($this->user)->get(route('home'));

        $response->assertSee('logout')
            ->assertSee('RESPONSIVE')
            ->assertViewIs('home')
            ->assertOk();
    }

    /**
     * @test
     */

    public function admin_can_see_user_list_view()
    {

        $user = factory(User::class)->create();

        $response = $this->actingAs($this->user)->get(route('users.index'));

        $response->assertSee('List')
            ->assertSee('User')
            ->assertViewIs('users.index')
            ->assertSee($this->user->name)
            ->assertOk();
        $responseUser= $response->getOriginalContent()['users'];
        $this->assertEquals($this->user->id, $responseUser->first()->id);
    }

    /**
     * @test
     */

    public function admin_can_see_show_user()
    {
        $user = factory(User::class)->create();

        $user->assignRole('Admin');

        $response = $this->actingAs($user)->get(route('users.show', $user));

        $response->assertSee('User')
            -> assertSee('Name')
            ->assertViewIs('users.show')
            ->assertSee($user->name)
            ->assertOk();

    }
    /**
     * @test
     */
    public function admin_can_see_edit_user_view()
    {
        $user = factory(User::class)->create();

        $user->assignRole('Admin');

        $response = $this->actingAs($user)->get(route('users.edit', $user));

        $response->assertSeeText('Edit')
            -> assertSeeText('Name')
            -> assertSee($user->name)
            ->assertViewIs('users.edit')
            ->assertOk();
    }
    /**
     * @test
     */
    public function admin_can_update_a_user()
    {

        $user = factory(User::class)->create();

        $this->actingAs($this->user)->put(
            route('users.update', $user), [

            'name' => 'Test Name',
            'last_name' => 'Test Last Name',
            'id_type' => 'NIT',
            'identification' => '1212124',
            'phone' => '3172798026',
            'address' => 'Test User address',
            'email' => 'test@gmail.com',
            'status' => 'Enable'

            ])->assertRedirect(route('users.show', $user))
            ->assertSessionHasNoErrors();

        $this->assertDatabasehas(
            'users', [
            'name' => 'Test Name',
            'last_name' => 'Test Last Name',
            'id_type' => 'NIT',
            'identification' => '1212124',
            'phone' => '3172798026',
            'address' => 'Test User address',
            'email' => 'test@gmail.com',
            'status' => 'Enable'
            ]
        );
    }

    /**
     * @test
     */
    public function admin_can_delete_a_user()
    {
        $user = factory(User::class)->create(['id' => '20']);

        $this->actingAs($this->user)->delete(route('users.destroy', $user))
            ->assertRedirect(route('users.index'));

        $this->assertDatabaseMissing('users', ['id'=>'20']);
    }






}
