<?php
namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;


class StocksTest extends TestCase
{
    use RefreshDatabase;

    Public Function testNoAuthenticatedUserCantAccessToProductIndex()
    {
        $this->get(route('stocks.index'))
            ->assertRedirect(route('login'));

    }
    Public Function testNoAuthenticatedUserCantAccessToProductShow()
    {
        $product = factory(Product::class)->create();


        $this->get(route('products.show',$product))
             ->assertRedirect(route('login'));

    }
    Public Function testNoAuthenticatedUserCantAccessToProductEdit()
    {
        $product=factory(Product::class)->create();

        $this->get(route('products.edit',$product))
             ->assertRedirect(route('login'));

    }
    Public Function testNoAuthenticatedUserCantAccessToProductUpdate()
    {
        $product=factory(Product::class)->create();

        $this->get(route('products.update',$product))
            ->assertRedirect(route('login'));

    }
    Public Function testNoAuthenticatedUserCantAccessToProductDelete()
    {
        $product = factory(Product::class)->create();

        $this->get(route('products.destroy', $product))
            ->assertRedirect(route('login'));
    }

        /** @test */

        function testItShowADefaultMessageIfTheStockListIsEmpty()

        {
            $user = factory(User::class)->create();

            $this->actingAs($user)->get(route('stocks.index'));

            $this->get(route('stocks.index'))
                ->assertStatus(200)
                ->assertSee('Stock Empty');
        }

}
