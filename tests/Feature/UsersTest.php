<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    Public Function testNoAuthenticatedUserCantAccessToUsersIndex()
    {
        $this->get(route('users.index'))
            ->assertRedirect(route('login'));

    }
    Public Function testNoAuthenticatedUserCantAccessToUsersShow()
    {
        $this->get(route('users.show'))
            ->assertRedirect(route('login'));

    }
    Public Function testNoAuthenticatedUserCantAccessToUsersEdit()
    {
        $this->get(route('users.edit'))
            ->assertRedirect(route('login'));

    }
    Public Function testNoAuthenticatedUserCantAccessToUsersUpdate()
    {
        $this->get(route('users.update  '))
            ->assertRedirect(route('login'));

    }
    Public Function testNoAuthenticatedUserCantAccessToUsersDelete()
    {
        $this->get(route('users.destroy'))
            ->assertRedirect(route('login'));

    }
}
