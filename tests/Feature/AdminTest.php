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

        Permission::create(['name' => 'users.index', 'description' => 'Access to see users list']);
        Permission::create(['name' => 'users.destroy','description' => 'Access to see delete users']);
        Permission::create(['name' => 'users.show','description' => 'Access to see a specific user']);
        Permission::create(['name' => 'users.edit','description' =>'Access to edit users']);
        Permission::create(['name' => 'home','description' => 'Access to see Admin Console']);

        $admin = Role::create(['name' => 'Admin','description' => 'Allows the user to have full access to the application.']);
        $admin->givePermissionTo([
            'users.index',
            'users.destroy',
            'users.show',
            'users.edit',
            'home'

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

        $response = $this->actingAs($this->user)->get(route('users.show', $user));

        $response->assertSee('User')
            -> assertSee('Name')
            ->assertViewIs('users.show')
            -> assertSee($user->name)
            ->assertOk();

        $this->assertDatabaseHas('users', ['name' => $user->name]);


    }
    /**
     * @test
     */
    public function admin_can_see_edit_user_view()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($this->user)->get(route('users.edit', $user));

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
