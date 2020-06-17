<?php
namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class UsersTest extends TestCase
{
    use WithFaker;
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


}
