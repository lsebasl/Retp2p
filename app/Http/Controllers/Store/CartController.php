<?php

namespace App\Http\Controllers\Store;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartUpdateRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //
    }

    /**
     * Show the view checkout in the store.
     *
     * @return View
     */
    public function show()
    {
        $user = Auth::user()->id;

        $carts = Cart::where('user_id',$user)->with('product')->get();

        $totalIva = $this->totalPrice();

        return view('store.cart',compact('carts','totalIva'))->with('success', 'Cart Has Benn Updated   !');

    }

    /**
     * Show the view checkout in the store.
     *
     * @param CartUpdateRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(CartUpdateRequest $request)
    {

        $user = Auth::user()->id;
        $cart = $request->all();

        Cart::truncate();

        unset($cart['cmd'],$cart['bn'],$cart['upload']);

        $totalItems = count($cart)/4;

        for($i = 1;$i<=$totalItems;$i++){

            $quantity = $request->get('quantity_'.$i);

            $price = $request->get('amount_'.$i);

            $productId = $request->get('id_'.$i);

            $discount = Product::where('id',$productId)->get('discount');

            $discount = $discount['0']->discount;

            $subtotal = $price * (1-$discount) * $quantity;

            Cart::create([
                'quantity' => $quantity,
                'product_id' => $productId ,
                'user_id' => $user,
                'price' => $price,
                'subtotal' => $subtotal,
            ]);
        }

       // $carts = Cart::where('user_id',$user)->with('product')->get();

       return redirect(route('cart.show'))->with('success', 'Products Has Been added!');

    }

    /**
     * @param $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CartUpdateRequest $request, $id)
    {
        $cart = Cart::where('id',$id)->first();

        $discount = Product::where('id',$cart->product_id)->get('discount');

        $discount = $discount['0']->discount;

        $subtotal = $cart->price * (1-$discount) * $request->get('quantity');

        $update = array_merge($request->validated(), ['subtotal' => $subtotal ]);

        $cart->update($update);

        return redirect()->route('cart.show')->with('success', 'Shopping Cart Has Been Updated!');
    }

    public function destroy($id)
    {
        $user = Auth::user()->id;

        $cart = Cart::findOrfail($id);

        $cart->delete($id);

       // $carts = Cart::where('user_id',$user)->with('product')->get();

        return redirect(route('cart.show'))->with('error', 'Product Has Been Deleted!');

    }

    public function totalPrice()
    {
        $user = Auth::user()->id;

        $value = Cart::where('user_id',$user)->sum('price');

        $subtotal = Cart::where('user_id',$user)->sum('subtotal');

        $discount = $value - $subtotal;

        $iva = $subtotal * 0.19;

        $total = $subtotal + $iva;

        return [
            'total'  => $total,
            'iva' => $iva,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'value' => $value,
        ];

    }



}
