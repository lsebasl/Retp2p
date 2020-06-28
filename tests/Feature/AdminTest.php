<?php
namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    /** @test*/

    public function testAdminCanSeeHomeView()
    {

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('home'));

        $response->assertSee('logout')
            -> assertSee('RESPONSIVE')
            ->assertViewIs('home')
            ->assertOk();
    }

    /** @test*/

    public function testAdminCanSeeUserListView()
    {

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('users.index'));

        $response->assertSee('List')
                 ->assertSee('Users')
                 ->assertViewIs('users.index')
                 ->assertSee($user->name)
                 ->assertOk();
        $responseUser= $response->getOriginalContent()['users'];
        $this->assertEquals($user->id,$responseUser->first()->id);
    }

    /** @test*/

    public function testAdminCanSeeUserShowView()
    {

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('users.show',$user));

        $response->assertSee('User')
            -> assertSee('Name')
            ->assertViewIs('users.show')
            -> assertSee($user->name)
            ->assertOk();


    }
    /** @test*/
    public function testAdminCanSeeUserEditView()

    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('users.edit',$user));

        $response->assertSeeText('Edit')
            -> assertSeeText('Name')
            -> assertSee($user->name)
            ->assertViewIs('users.edit')
            ->assertOk();
    }
    /** @test*/

    public function testAdminCanDeleteUpdated()
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

    public function testAdminCanDeleteUser()
    {
        $user = factory(User::class)->create();
        $admin = factory(User::class)->create();

        $this->actingAs($admin)->delete(route('users.destroy',$user))
            ->assertRedirect(route('users.index'));

        $this->assertDatabaseMissing('users',['id'=>$user->id]);
    }



}
