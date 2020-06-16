<?php
namespace Tests\Feature;

use App\Notifications\VerifyEmail;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class AdminTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    function testUserCanSeeUserListView()
    {

        $this->withoutMiddleware();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('users.index'));

        $response->assertSee('List')
                -> assertSee('Users');
    }
    function testUserCanSeeUserShowView()
    {

        $this->withoutMiddleware();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('users.show',$user));

        $response->assertSee('List')
            -> assertSee('Show');
    }
}
