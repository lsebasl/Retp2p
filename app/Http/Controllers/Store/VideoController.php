<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\View\View;

class VideoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


    }

    /**
     * Show the about us in the store.
     *
     * @return View
     */
    public function index():View
    {
        $product = Product::where('status', 'enable')->get();

        return view('store.video', ['products' => $product]);
    }

}
