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

    Public Function testNoAuthenticatedUserCantAccessToUsersIndex()
    {
        $this->get(route('users.index'))
             ->assertRedirect(route('login'));

    }
    Public Function testNoAuthenticatedUserCantAccessToUsersShow()
    {
        $user=factory(User::class)->create();

        $this->get(route('users.show',$user))
             ->assertRedirect(route('login'));

    }
    /*Public Function testNoAuthenticatedUserCantAccessToUsersEdit()
    {
        $user=factory(User::class)->create();

        $this->get(route('users.edit',$user))
             ->assertRedirect(route('login'));

    }*/
    /*Public Function testNoAuthenticatedUserCantAccessToUsersUpdate()
    {
        $user=factory(User::class)->create();

        $this->put(route('users.update',$user))
             ->assertRedirect(route('login'));

    }

    Public Function testNoAuthenticatedUserCantAccessToUsersDelete()
    {
        $user=factory(User::class)->create();

        $this->delete(route('users.destroy',$user))
             ->assertRedirect(route('login'));

    }*/
}
