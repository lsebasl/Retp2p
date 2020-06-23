<?php
namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;


    /** @test*/

    function testAdminCanSeeHomeView()
    {

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('home'));

        $response->assertSee('logout')
            -> assertSee('RESPONSIVE')
            ->assertViewIs('home');
    }

    /** @test*/

    function testAdminCanSeeUserListView()
    {

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('users.index'));

        $response->assertSee('List')
                 -> assertSee('Users')
                 ->assertViewIs('users.index')
                 -> assertSee($user->name);
    }

    /** @test*/

    function testAdminCanSeeUserShowView()
    {

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('users.show',$user));

        $response->assertSee('User')
            -> assertSee('Name')
            ->assertViewIs('users.show')
            -> assertSee($user->name);

    }
    /** @test*/
    function testAdminCanSeeUserEditView()

    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('users.edit',$user));

        $response->assertSee('Edit')
            -> assertSee('Name')
            -> assertSee($user->name)
            ->assertViewIs('users.edit');
    }
    /** @test*/

    function testAdminCanDeleteUpdated()
    {

        $user = factory(User::class)->create();
        $admin = factory(User::class)->create();

        $this->actingAs($admin)->put(route('users.update', $user), [

            'name' => 'Test Name',
            'last_name' => 'Test Last Name',
            'id_type' => 'NIT',
            'identification' => 'Test User last Name',
            'phone' => '3172798026',
            'address' => 'Test User address',
            'email' => 'test@gmail.com',

        ])
             ->assertRedirect(route('users.show',$user))
             ->assertSessionHasNoErrors();

        $this->assertDatabasehas('users',[
            'name' => 'Test Name',
            'last_name' => 'Test Last Name',
        ]);
    }
    /** @test*/

    function testAdminCanDeleteUser()
    {
        $user = factory(User::class)->create();
        $admin = factory(User::class)->create();

        $this->actingAs($admin)->delete(route('users.destroy',$user))
            ->assertRedirect(route('users.index'));

        $this->assertDatabaseMissing('users',['id'=>$user->id]);
    }


}
