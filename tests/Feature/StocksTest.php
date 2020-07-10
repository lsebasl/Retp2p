<?php
namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;


class StocksTest extends TestCase
{
    use RefreshDatabase;

    Public Function no_authenticated_user_cant_access_to_stocks_index()
    {
        $this->get(route('stocks.index'))
            ->assertRedirect(route('login'));

    }
    Public Function no_authenticated_user_cant_access_to_product_show()
    {
        $product = factory(Product::class)->create();


        $this->get(route('products.show',$product))
             ->assertRedirect(route('login'));

    }
    Public Function no_authenticated_user_cant_access_to_product_edit()
    {
        $product=factory(Product::class)->create();

        $this->get(route('products.edit',$product))
             ->assertRedirect(route('login'));

    }
    Public Function no_authenticated_user_cant_access_to_product_update()
    {
        $product=factory(Product::class)->create();

        $this->get(route('products.update',$product))
            ->assertRedirect(route('login'));

    }
    Public Function no_authenticated_user_cant_access_to_product_delete()
    {
        $product = factory(Product::class)->create();

        $this->get(route('products.destroy', $product))
            ->assertRedirect(route('login'));
    }

        /** @test */

    public function it_show_if_stock_list_is_empty()

        {
            $user = factory(User::class)->create();

            $this->actingAs($user)->get(route('stocks.index'));

            $this->get(route('stocks.index'))
                ->assertStatus(200)
                ->assertSee('Stock Empty')
                ->assertOk();
        }

}
