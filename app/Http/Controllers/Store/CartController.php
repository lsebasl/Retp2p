<?php

namespace App\Http\Controllers\Store;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartStoreRequest;
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
     * @param CartStoreRequest $request
     * @return View
     */
    public function show(CartStoreRequest $request)
    {

        $user = Auth::user()->id;
        $cart = $request->all();

        Cart::truncate();

        unset($cart['cmd'],$cart['bn'],$cart['upload']);

        $totalItems = count($cart)/3;

        for($i = 1;$i<=$totalItems;$i++){
            Cart::create([
                'name' => $request->get('w3ls_item_'.$i),
                'quantity' => $request->get('quantity_'.$i),
                'price' => $request->get('amount_'.$i),
                'user_id' => $user,
            ]);
        }
        $carts = Cart::where('user_id',$user)->get();


       return view('store.cart',compact('carts'));

    }


    public function add(Request $request,Product $product)
    {
        dd($request);

        $cart = \Session::get('cart');
        $product->units = 1;
        $cart[$product->slug] = $product;
        \Session::put('cart',$cart);

        return redirect()->route('cart.show');
    }


}
