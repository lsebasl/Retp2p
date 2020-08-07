<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Redirect;
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
        if(!\Session::has('cart'))\Session::put('cart',array());
    }

    /**
     * Show the view checkout in the store.
     *
     * @return View
     */
    public function show()
    {
        return \Session::get('cart');
    }

    public function add(Product $product)
    {
        $cart = \Session::get('cart');
        $product->units = 1;
        $cart[$product->slug] = $product;
        \Session::put('cart',$cart);

        return redirect()->route('cart.show');
    }


}
