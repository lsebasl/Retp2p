<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    public function index()

    {
        $product = Product::all();

        return response()->view('stocks.index', ['products' => $product]);

    }
}
