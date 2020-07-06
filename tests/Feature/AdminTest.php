<?php
namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Filesystem\Cache;
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
                 ->assertSee('User')
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

    public function testAdminCanUpdatedUser()
    {

        $user = factory(User::class)->create();
        $admin = factory(User::class)->create();

        $this->actingAs($admin)->put(route('users.update', $user), [

            'name' => 'Test Name',
            'last_name' => 'Test Last Name',
            'id_type' => 'NIT',
            'identification' => '1212124',
            'phone' => '3172798026',
            'address' => 'Test User address',
            'email' => 'test@gmail.com',
            'status' => 'Enable'

        ])
             ->assertRedirect(route('users.show',$user))
             ->assertSessionHasNoErrors();

        $this->assertDatabasehas('users',[
            'name' => 'Test Name',
            'last_name' => 'Test Last Name',
            'id_type' => 'NIT',
            'identification' => '1212124',
            'phone' => '3172798026',
            'address' => 'Test User address',
            'email' => 'test@gmail.com',
            'status' => 'Enable'
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


    /** @test*/

    public function testAdminCanSeeProductsView()
    {

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('products.index'));

        $response->assertSee('Computers')
            -> assertSee('Mobiles')
            -> assertSee('Accessories')
            ->assertViewIs('products.index')
            ->assertOk();
    }
    /** @test*/

    public function testAdminCanSeeProductEditView()

    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();

        $response = $this->actingAs($user)->get(route('products.edit',$product));

        $response->assertSeeText('Barcode')
            -> assertSeeText('Name')
            -> assertSeeText('Mark')
            -> assertSeeText('Category')
            -> assertSeeText('Description')
            -> assertSeeText('Status')
            -> assertSee($product->name)
            ->assertViewIs('products.edit')
            ->assertOk();
    }


}
