<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StocksController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the clients..
     *
     * @return View
     */

    public function index():View
    {
        $product = Product::all();

        return view('stocks.index', ['products' => $product]);

    }
}
