<?php

namespace Tests\Feature;

use App\Cart;
use App\Category;
use App\Invoice;
use App\PaymentAttempt;
use App\Product;
use App\User;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function guests_user_cant_access_to_checkout_view()
    {
        $this->get(route('cart.show'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function guests_user_cant_access_to_payment()
    {
        $this->get(route('payment.attempt'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function guests_cannot_access_to_create_payment_attempts_view()
    {
        $this->get(route('payment.history'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function guests_cannot_access_to_create_payment_history_view()
    {
        $this->get(route('payment.history'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function guests_cannot_access_to_create_payment_callback_view()
    {
        $this->get(route('payment.callback'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function guests_cannot_update_checkout()
    {
        $user = factory(User::class)->create(['id' => 1]);
        $productId = factory(Product::class)->create(['id'=> 4]);
        $item = factory(Cart::class)->create(['quantity' => 2, 'product_id' => $productId->id, 'price' => 3000,'user_id' => $user->id]);
        $this->put(route('cart.update',$item),['quantity' => 3])
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function guests_cannot_delete_checkout()
    {
        $user = factory(User::class)->create(['id' => 1]);
        $productId = factory(Product::class)->create(['id'=> 4]);
        $item = factory(Cart::class)->create(['quantity' => 2, 'product_id' => $productId->id, 'price' => 3000,'user_id' => $user->id]);
        $this->delete(route('cart.destroy',$item))
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

        $response1 = $this->actingAs($user)->post(route('cart.add',
                [
                    'quantity_1' => 1,
                    'w3ls_item_1' => 'Power',
                    'id_1' => 166,
                    'amount_1'=> 11364,
                ]))->assertRedirect(route('cart.show'));

        $this->assertDatabaseHas('carts', [
            'quantity' => '1',
            'product_id' => '166',
            'user_id' => $user->id,
            'price' => $product->price,
            'subtotal' => '7954.8',
        ]);

    }

    /** @test */
    public function client_can_update_checkout()
    {
        $user = factory(User::class)->create(['id' => 1]);
        $productId = factory(Product::class)->create(['id'=> 4]);
        $item = factory(Cart::class)->create(['quantity' => 2, 'product_id' => $productId->id, 'price' => 3000,'user_id' => $user->id]);
        $this->actingAs($user)->put(route('cart.update',$item),['quantity' => 3])
            ->assertRedirect(route('cart.show'));

        $this->assertDatabaseHas('carts',['quantity' => 3]);

    }

    /** @test */
    public function client_can_delete_checkout()
    {
        $user = factory(User::class)->create(['id' => 1]);
        $productId = factory(Product::class)->create(['id'=> 4]);
        $item = factory(Cart::class)->create(['quantity' => 2, 'product_id' => $productId->id, 'price' => 3000,'user_id' => $user->id]);
        $this->actingAs($user)->delete(route('cart.destroy',$item))
            ->assertRedirect(route('cart.show'));

        $this->assertDatabaseEmpty('carts');
    }


        /**
         * @test
         */
        public function client_authenticated_can_see_the_shopping_bag()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create(['id' => '166', 'price' => '11364', 'discount' => 0.1]);
        $cart = factory(Cart::class)->create(['user_id' => $user->id,'product_id' => $product->id,'price' => $product->price]);

        $response =  $this->actingAs($user)->post(route('cart.show'));

        $response->assertsee('My Shopping Bag')
            ->assertsee('Qty')
            ->assertSee($product->mark)
            ->assertSee('11,364')
            ->assertSee('11,36');

    }

    /** @test */
        public function client_can_create_buy_order()
    {
        $user = factory(User::class)->create(['id' => 1]);
        $product = factory(Product::class)->create(['id'=> 4,'price' => 3000]);
        $cart = factory(Cart::class)->create(['quantity' => 2, 'product_id' => $product->id, 'price' => $product->price,'user_id' => $user->id,'subtotal'=>'6000']);
        $this->actingAs($user)->get(route('invoices.create'))
            ->assertRedirect(route('payment.attempt'));

        $this->assertDatabaseHas('invoices',['users_id' => $user->id,
            'status' => 'Pending',
            'subtotal' => 6000,
            'Vat' => 1140,
            'total' => 7140,]);
    }

    /** @test */
    public function client_can_see_to_history_after_to_pay()
    {
        $user = factory(User::class)->create(['id' => 1]);
        $product = factory(Product::class)->create(['id'=> 4,'price' => 3000]);
        $invoice = factory(Invoice::class)->create(['users_id' => $user->id,'total' => 10000,'subtotal' => 6000]);
        $paymentAttempt = factory(PaymentAttempt::class)->create(['invoice_id'=>$invoice->id]);
        $this->actingAs($user)->get(route('payment.history'))
            ->assertSee('Status')
            ->assertSee($paymentAttempt->RequestId)
            ->assertSee($paymentAttempt->status)
            ->assertSee($paymentAttempt->invoice_id);

    }

/*
 public function client_can_back_to_store_after_to_pay()
    {
        $this->withoutExceptionHandling();

        $ptoPlayMock = \Mockery::mock(PlacetoPay::class)->makePartial();

        $ptoPlayMock->shouldReceive('callback')->once();

        $this->instance()

        $user = factory(User::class)->create(['id' => 1]);
        $product = factory(Product::class)->create(['id'=> 4,'price' => 3000]);
        $invoice = factory(Invoice::class)->create(['users_id' => $user->id,'total' => 10000,'subtotal' => 6000]);
        $paymentAttempt = factory(PaymentAttempt::class)->create(['invoice_id'=>$invoice->id]);
        $this->actingAs($user)->get(route('payment.callback'))
            ->assertRedirect(route('payment.history'));

    }*/


}
