<?php

namespace Tests\Feature;

use App\Cart;
use App\Category;
use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function no_authenticated_user_cant_access_to_home_view()
    {
        $this->get(route('cart.show'))
            ->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function client_authenticated_can_see_product_checkout_view()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('cart.show'));

        $response->assertSee('My Shopping Bag')
            ->assertSee('Price Details')
            ->assertSee('logout')
            ->assertStatus(200)
            ->assertOk();
    }

    /**
     * @test
     */
    public function client_authenticated_can_add_product_to_shopping_bag()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create(['id' => '166', 'price' => '11364', 'discount' => 0.3]);

        $response = $this->actingAs($user)->get('/cart/add?quantity_1=1&w3ls_item_1=Power&id_1=166&amount_1=11364&cmd=_cart&upload=1&bn=sbmincart_AddToCart_WPS_US')
            ->assertRedirect(route('cart.show'));

        $this->assertDatabaseHas('carts', [
            'quantity' => '1',
            'product_id' => '166',
            'user_id' => $user->id,
            'price' => $product->price,
            'subtotal' => '7954.8',
        ]);
    }
        /**
         * @test
         */
        public function client_authenticated_can_see_the_shopping_bag()
    {
        $user = factory(User::class)->create();
        $cart = factory(Cart::class)->create();
        $product = factory(Product::class)->create(['id' => '166','price' => '11364','discount'=>0.3]);

        $response =  $this->actingAs($user)->get(route('cart.show'));

    }

}
