<?php

namespace App\Http\Controllers\Store;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartUpdateRequest;
use App\Product;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class CartController extends Controller
{
        protected  $user;
        protected $cartRepository;
        protected $productRepository;

    /**
     * Create a new controller instance.
     *
     * @param User              $user
     * @param CartRepository    $cartRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(User $user,CartRepository $cartRepository,ProductRepository $productRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->user = $user;
    }

    /**
     * Show the view checkout in the store.
     *
     * @return View
     */
    public function show():View
    {

        $carts = $this->cartRepository->getProduct();

        $totalIva = $this->totalPrice($carts);

        return view('store.cart', compact('carts', 'totalIva'))->with('success', 'Cart Has Benn Updated   !');

    }

    /**
     * Add products to checkout, store totals and redirect to checkout view.
     *
     * @param  CartUpdateRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function add(CartUpdateRequest $request):RedirectResponse
    {

        $this->destroyAll();

        $cart = $request->all();

        unset($cart['cmd'], $cart['bn'], $cart['upload']);

        $totalItems = count($cart)/4;

        for($i = 1;$i<=$totalItems;$i++) {

            $quantity = $request->get('quantity_' . $i);

            $productId = $request->get('id_' . $i);

            $price = $this->productRepository->getPrice($productId);

            $discount = $this->productRepository->getDiscount($productId);

            $subtotal = $price * (1 - $discount) * $quantity;

            Cart::create(
                [
                'quantity' => $quantity,
                'product_id' => $productId,
                'user_id' => $this->user->authUser(),
                'price' => $price,
                'subtotal' => $subtotal,
                ]
            );
        }
        return redirect(route('cart.show'))->with('success', 'Products Has Been added!');
    }

    /**
     * Update the quantity in the checkout.
     *
     * @param  CartUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(CartUpdateRequest $request, $id):RedirectResponse
    {
        $cart = $this->cartRepository->findOrFail($id);

        $discount = $this->productRepository->getDiscount($cart->product_id);

        $subtotal = $cart->price * (1-$discount) * $request->get('quantity');

        $update = array_merge($request->validated(), ['subtotal' => $subtotal ]);

        $cart->update($update);

        return redirect()->route('cart.show')->with('success', 'Shopping Cart Has Been Updated!');
    }

    /**
     * Eliminate a specific element in the checkout
     *
     * @param  $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $cart = $this->cartRepository->findOrFail($id);

        $cart->delete($id);

        return redirect(route('cart.show'))->with('error', 'Product Has Been Deleted!');

    }

    /**
     * Generate all the concepts to pay in the checkout.
     *
     * @param  $cart
     * @return array
     */
    public function totalPrice($cart):array
    {

        $subtotal = $this->getSubtotal($cart);

        $subtotalNoDiscount = $subtotal['subtotalNoDiscount'];

        $subtotalWithDiscount = $subtotal['subtotal'];

        $discount = $subtotalWithDiscount - $subtotalNoDiscount;

        $iva = $subtotalWithDiscount * 0.19;

        $total = $subtotalWithDiscount + $iva;

        return [
            'total'  => $total,
            'iva' => $iva,
            'subtotal' => $subtotalNoDiscount,
            'discount' => $discount,
            'value' => $subtotalWithDiscount,
        ];

    }

    /**
     * Destroy all elements in the checkout
     *
     * @return void
     */
    public function destroyAll():void
    {
        $cart = $this->cartRepository->getCart();

        $cart->each(
            function ($item) {
                $item->delete($item->id);
            }
        );

    }


    /**
     * Give the subtotal with and without discount
     *
     * @param  $cart
     * @return array
     */
    public function getSubtotal($cart):array
    {
        $subtotal = $cart->map(
            function ($cart) {

                $price = $this->productRepository->getPrice($cart->product_id);

                $subtotalNoDiscount = $price * $cart->quantity;

                $discount = $this->productRepository->getDiscount($cart->product_id);

                $subtotal = $subtotalNoDiscount * (1 - $discount);

                return [
                'subtotal' =>  $subtotal,
                'subtotalNoDiscount' => $subtotalNoDiscount
                ];

            }
        );

        return [
           'subtotal' => $subtotal->sum('subtotal'),
           'subtotalNoDiscount' => $subtotal->sum('subtotalNoDiscount'),
        ];

    }

}
