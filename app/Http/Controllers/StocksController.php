<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StocksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('verified');
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
