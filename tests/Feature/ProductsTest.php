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
    public function testNoAuthenticatedUserCantAccessToProductIndex()
    {
        $this->get(route('products.index'))
            ->assertRedirect(route('login'));

    }

    /** @test */
    public function testNoAuthenticatedUserCantAccessToProductCreate()
    {
        $this->get(route('products.create'))
            ->assertRedirect(route('login'));

    }

    /** @test */
    public function testNoAuthenticatedUserCantAccessToProductShow()
    {
        $product=factory(Product::class)->create();

        $this->get(route('products.show',$product))
            ->assertRedirect(route('login'));

    }
    /** @test */
    public function testNoAuthenticatedUserCantAccessToProductEdit()
    {
        $Product=factory(Product::class)->create();

        $this->get(route('products.edit',$Product))
            ->assertRedirect(route('login'));

    }
    /** @test */
    public function testNoAuthenticatedUserCantAccessToProductUpdate()
    {
        $Product=factory(Product::class)->create();

        $this->put(route('products.update',$Product))
            ->assertRedirect(route('login'));

    }
    /** @test */
    public function testNoAuthenticatedUserCantAccessToProductDelete()
    {
        $product=factory(Product::class)->create();

        $this->delete(route('products.destroy',$product))
            ->assertRedirect(route('login'));

    }


    /** @test */
    public function testItShowADefaultMessageIfTheProductListIsEmpty()

    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->get(route('users.index'));

        $this->get(route('products.index'))
            ->assertStatus(200)
            ->assertSee('Without Products')
            ->assertOk();


    }

}
