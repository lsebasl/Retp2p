<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    Function testNoAuthenticatedUserCantAccessToProductIndex()
    {
        $this->get(route('products.index'))
            ->assertRedirect(route('login'));

    }

    /** @test */
    function testNoAuthenticatedUserCantAccessToProductCreate()
    {
        $this->get(route('products.create'))
            ->assertRedirect(route('login'));

    }

    /** @test */
    Function testNoAuthenticatedUserCantAccessToProductShow()
    {
        $product=factory(Product::class)->create();

        $this->get(route('products.show',$product))
            ->assertRedirect(route('login'));

    }
    /** @test */
    Function testNoAuthenticatedUserCantAccessToProductEdit()
    {
        $Product=factory(Product::class)->create();

        $this->get(route('products.edit',$Product))
            ->assertRedirect(route('login'));

    }
    /** @test */
    Function testNoAuthenticatedUserCantAccessToProductUpdate()
    {
        $Product=factory(Product::class)->create();

        $this->put(route('products.update',$Product))
            ->assertRedirect(route('login'));

    }
    /** @test */
    Function testNoAuthenticatedUserCantAccessToProductDelete()
    {
        $product=factory(Product::class)->create();

        $this->delete(route('products.destroy',$product))
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
