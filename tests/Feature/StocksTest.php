<?php
namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StocksTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

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
}
