<?php
namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class UsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testNoAuthenticatedUserCantAccessToUsersIndex()
    {
        $response = $this->get(route('users.index'));
        $response->assertRedirect(route('login'));

    }
    /** @test */
    public function testNoAuthenticatedUserCantAccessToUsersShow()
    {
        $user=factory(User::class)->create();

        $this->get(route('users.show',$user))
             ->assertRedirect(route('login'));

    }
    /** @test */
    public function testNoAuthenticatedUserCantAccessToUsersEdit()
    {
        $user=factory(User::class)->create();

        $this->get(route('users.edit',$user))
             ->assertRedirect(route('login'));

    }
    /** @test */
    public function testNoAuthenticatedUserCantAccessToUsersUpdate()
    {
        $user=factory(User::class)->create();

        $this->put(route('users.update',$user))
             ->assertRedirect(route('login'));

    }
    /** @test */
    public function testNoAuthenticatedUserCantAccessToUsersDelete()
    {
        $user=factory(User::class)->create();

        $this->delete(route('users.destroy',$user))
             ->assertRedirect(route('login'));

    }
    /** @test */
    public function testNoAuthenticatedUserCanSeeLogin()
    {

        $this->get(route('login'))
            ->assertSee('Sign in with your Account')
            ->assertSee('Password');

    }
    /** @test */
    public function testNoAuthenticatedUserCanSeeWelcome()
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

    public function testNoAuthenticatedUserCantsDeleteAUser()
    {
        $user = factory(User::class)->create();

        $this->delete(route('users.destroy',$user))
            ->assertRedirect(route('login'));

        $this->assertDatabasehas('users',['id'=>$user->id]);
    }



}
