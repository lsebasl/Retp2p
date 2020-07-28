<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Filesystem\Cache;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

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



}
