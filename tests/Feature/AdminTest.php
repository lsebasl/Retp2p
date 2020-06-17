<?php
namespace Tests\Feature;

use App\Http\Controllers\UsersController;
use App\Notifications\VerifyEmail;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class AdminTest extends TestCase
{
    use WithFaker;
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


}
