<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    function testNoAuthenticatedUserCantAccessToProductCreate()
    {
        $this->get(route('products.create'))
            ->assertRedirect(route('login'));

    }

    /** @test */
    function testItShowADefaultMessageIfTheProductListIsEmpty()

    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->get(route('users.index'));

        $this->get(route('products.index'))
            ->assertStatus(200)
            ->assertSee('Without Products');


    }

}
