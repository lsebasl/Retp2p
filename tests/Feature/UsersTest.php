<?php
namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class UsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    Function testNoAuthenticatedUserCantAccessToUsersIndex()
    {
        $this->get(route('users.index'))
             ->assertRedirect(route('login'));

    }
    /** @test */
    Function testNoAuthenticatedUserCantAccessToUsersShow()
    {
        $user=factory(User::class)->create();

        $this->get(route('users.show',$user))
             ->assertRedirect(route('login'));

    }
    /** @test */
    Function testNoAuthenticatedUserCantAccessToUsersEdit()
    {
        $user=factory(User::class)->create();

        $this->get(route('users.edit',$user))
             ->assertRedirect(route('login'));

    }
    /** @test */
    Function testNoAuthenticatedUserCantAccessToUsersUpdate()
    {
        $user=factory(User::class)->create();

        $this->put(route('users.update',$user))
             ->assertRedirect(route('login'));

    }
    /** @test */
    Function testNoAuthenticatedUserCantAccessToUsersDelete()
    {
        $user=factory(User::class)->create();

        $this->delete(route('users.destroy',$user))
             ->assertRedirect(route('login'));

    }
    /** @test */
    Function testNoAuthenticatedUserCanSeeLogin()
    {

        $this->get(route('login'))
            ->assertSee('Sign in with your Account')
            ->assertSee('Password');

    }
    /** @test */
    Function testNoAuthenticatedUserCanSeeWelcome()
    {

        $this->get('/')
            ->assertSee('Project Store');

    }
    /** @test */
    public function testNoAuthenticatedUserCantUpdateAClient()
    {
        $user = factory(User::class)->create();

        $this->put(route('users.update', $user), [

            'name' => 'Test Name',
            'last_name' => 'Test Last Name',
            'id_type' => 'NIT',
            'identification' => 'Test User last Name',
            'phone' => '3172798026',
            'address' => 'Test User address',
            'email' => 'test@gmail.com',

        ])
            ->assertRedirect(route('login'));

        $this->assertDatabaseMissing('users',['id'=>$user->name]);

    }



}
